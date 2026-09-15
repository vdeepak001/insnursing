<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\FrontendUserPasswordMail;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class FrontendRegisteredUserController extends Controller
{
    /**
     * Display the frontend (nursing) registration form.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle frontend user registration without touching admin register flow.
     */
    public function store(Request $request, SmsService $smsService): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'state' => [
                'required',
                'string',
                Rule::exists('states', 'name')->where(function ($query) {
                    $query->where('status', 'active')->whereNull('deleted_at');
                }),
            ],
            'qualification' => ['required', 'string', Rule::in([
                'GNM',
                'ANM',
                'PB BSc Nursing',
                'BSc Nursing',
                'MSc Nursing',
                'PhD Nursing',
            ])],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'rn_number' => ['required', 'string', 'max:100'],
            'uid' => ['nullable', 'string', 'alpha_num', 'max:100'],
        ], [
            'uid.alpha_num' => 'The UID must contain only letters and numbers without special characters.',
        ]);

        $validator->after(function ($validator) use ($request) {
            $allUsers = User::withTrashed()->get();

            $normalizedEmail = Str::lower(trim((string) $request->input('email')));
            $emailAlreadyExists = $allUsers->contains(function (User $user) use ($normalizedEmail): bool {
                return Str::lower(trim((string) $user->email)) === $normalizedEmail;
            });

            if ($emailAlreadyExists) {
                $validator->errors()->add('email', 'This email is already registered.');
            }

            $normalizedPhone = trim((string) $request->input('phone'));
            $phoneAlreadyExists = $allUsers->contains(function (User $user) use ($normalizedPhone): bool {
                return trim((string) $user->phone) === $normalizedPhone;
            });

            if ($phoneAlreadyExists) {
                $validator->errors()->add('phone', 'This mobile number is already registered.');
            }

            $normalizedState = Str::lower(trim((string) $request->input('state')));
            $normalizedUid = filled($request->input('uid')) ? Str::lower(trim((string) $request->input('uid'))) : null;

            if ($normalizedState === 'maharashtra' && $normalizedUid !== null) {
                $uidAlreadyExists = $allUsers->contains(function (User $user) use ($normalizedUid): bool {
                    return $user->uid !== null
                        && Str::lower(trim((string) $user->state)) === 'maharashtra'
                        && Str::lower(trim((string) $user->uid)) === $normalizedUid;
                });

                if ($uidAlreadyExists) {
                    $validator->errors()->add('uid', 'This UID is already registered for Maharashtra.');
                }
            }
        });

        $validated = $validator->validateWithBag('frontendRegister');

        $generatedPassword = Str::random(10);
        $normalizedEmail = Str::lower(trim($validated['email']));

        $user = User::query()->create([
            'name' => $validated['name'],
            'email' => $normalizedEmail,
            'password' => Hash::make($generatedPassword),
            'password_raw' => $generatedPassword,
            'role_type' => 'user',
            'active_status' => true,
            'state' => $validated['state'],
            'qualification' => $validated['qualification'],
            'phone' => $validated['phone'],
            'rn_number' => $validated['rn_number'],
            'uid' => $validated['uid'] ?? null,
            'date_of_birth' => $validated['date_of_birth'],
        ]);

        Mail::to($user->email)->send(new FrontendUserPasswordMail($user, $generatedPassword, 'register'));

        if (filled($user->phone)) {
            try {
                $smsService->sendRegistrationCredentials(
                    $user->phone,
                    $user->email,
                    $generatedPassword,
                    $user->unique_sequence_number
                );
            } catch (\Exception $e) {
                report($e);
            }
        }

        return back()
            ->with('success', 'Your account has been created. Login details were sent to your email and mobile number.')
            ->with('registered_user', [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $generatedPassword,
            ]);
    }
}
