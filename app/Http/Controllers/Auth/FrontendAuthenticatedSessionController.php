<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\FrontendUserPasswordMail;
use App\Mail\PretestOtpMail;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class FrontendAuthenticatedSessionController extends Controller
{
    /**
     * Handle frontend user authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $normalizedEmail = Str::lower(trim((string) $request->input('email')));
        $user = $this->findFrontendUserByEmail($normalizedEmail);

        if (! $user || ! Hash::check((string) $request->input('password'), $user->password)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        if ($user->role_type !== 'user') {
            throw ValidationException::withMessages([
                'email' => 'This login is only for frontend user accounts.',
            ]);
        }

        if (! $user->active_status) {
            throw ValidationException::withMessages([
                'email' => 'Your account is deactivated. Please contact support.',
            ]);
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Send a forgot-password OTP to the user's registered mobile number.
     */
    public function sendForgotPasswordOtp(Request $request, SmsService $smsService): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        $normalizedEmail = Str::lower(trim((string) $validated['email']));
        $user = $this->findFrontendUserByEmail($normalizedEmail);

        if (! $user || $user->role_type !== 'user') {
            throw ValidationException::withMessages([
                'email' => 'Frontend user account not found for this email.',
            ]);
        }

        if (! filled($user->email) && ! filled($user->phone)) {
            throw ValidationException::withMessages([
                'email' => 'No email or mobile number is registered for this account. Please contact support.',
            ]);
        }

        $otp = (string) random_int(100000, 999999);

        session()->put($this->forgotPasswordSessionKey($normalizedEmail), [
            'code' => $otp,
            'expires_at' => now()->addMinutes(10),
            'attempts' => 0,
            'email' => $normalizedEmail,
        ]);

        $deliveryErrors = [];

        if (filled($user->email)) {
            try {
                Mail::to($user->email)->send(new PretestOtpMail($user, $otp, 'Password Reset', 'forgot'));
            } catch (\Exception $e) {
                report($e);
                $deliveryErrors[] = 'email';
            }
        }

        if (filled($user->phone)) {
            if (! $smsService->sendForgotPasswordOtp($user->phone, $otp)) {
                $deliveryErrors[] = 'sms';
            }
        }

        if ($deliveryErrors !== []) {
            $message = match ($deliveryErrors) {
                ['email', 'sms'], ['sms', 'email'] => 'Unable to send OTP to your email and mobile. Please try again later.',
                ['email'] => 'Unable to send OTP to your email. Please try again later.',
                default => 'Unable to send OTP to your mobile number. Please try again later.',
            };

            throw ValidationException::withMessages([
                'email' => $message,
            ]);
        }

        return back()
            ->with('forgot_otp_sent', true)
            ->with('forgot_otp_email', $normalizedEmail)
            ->with('success', 'OTP sent to your registered email and mobile number.');
    }

    /**
     * Verify forgot-password OTP and email a new temporary password.
     */
    public function verifyForgotPasswordOtp(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $normalizedEmail = Str::lower(trim((string) $validated['email']));
        $user = $this->findFrontendUserByEmail($normalizedEmail);

        if (! $user || $user->role_type !== 'user') {
            throw ValidationException::withMessages([
                'email' => 'Frontend user account not found for this email.',
            ]);
        }

        $sessionKey = $this->forgotPasswordSessionKey($normalizedEmail);
        $stored = session()->get($sessionKey);

        if (! $stored || now()->greaterThan($stored['expires_at'])) {
            throw ValidationException::withMessages([
                'otp' => 'The OTP has expired. Please request a new one.',
            ]);
        }

        $stored['attempts']++;
        session()->put($sessionKey, $stored);

        if ($stored['attempts'] > 3) {
            session()->forget($sessionKey);

            throw ValidationException::withMessages([
                'otp' => 'Too many incorrect attempts. Please request a new OTP.',
            ]);
        }

        if (trim($stored['code']) !== trim($validated['otp'])) {
            $remaining = 3 - $stored['attempts'];

            throw ValidationException::withMessages([
                'otp' => $remaining > 0
                    ? "Invalid OTP. {$remaining} attempt(s) remaining."
                    : 'Too many incorrect attempts. Please request a new OTP.',
            ]);
        }

        session()->forget($sessionKey);

        $generatedPassword = Str::random(10);
        $user->forceFill([
            'password' => Hash::make($generatedPassword),
            'password_raw' => $generatedPassword,
        ])->save();

        Mail::to($user->email)->send(new FrontendUserPasswordMail($user, $generatedPassword, 'forgot'));

        return back()
            ->with('success', 'OTP verified. A new temporary password has been sent to your email.')
            ->with('forgot_otp_sent', false);
    }

    protected function findFrontendUserByEmail(string $normalizedEmail): ?User
    {
        return User::query()
            ->get()
            ->first(function (User $user) use ($normalizedEmail): bool {
                return Str::lower(trim((string) $user->email)) === $normalizedEmail;
            });
    }

    protected function forgotPasswordSessionKey(string $normalizedEmail): string
    {
        return 'forgot_password_otp_'.hash('sha256', $normalizedEmail);
    }
}
