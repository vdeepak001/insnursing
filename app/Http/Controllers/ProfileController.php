<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();

        $targetState = Str::lower(trim((string) ($validated['state'] ?? $user->state)));
        $targetUid = filled($validated['uid'] ?? null) ? Str::lower(trim((string) $validated['uid'])) : null;

        if ($targetState === 'maharashtra' && $targetUid !== null) {
            $uidAlreadyExists = User::query()
                ->where('id', '!=', $user->id)
                ->whereNotNull('uid')
                ->get()
                ->contains(function (User $otherUser) use ($targetUid): bool {
                    return Str::lower(trim((string) $otherUser->state)) === 'maharashtra'
                        && Str::lower(trim((string) $otherUser->uid)) === $targetUid;
                });

            if ($uidAlreadyExists) {
                return back()
                    ->withErrors([
                        'uid' => 'This UID is already registered for Maharashtra.',
                    ])
                    ->withInput();
            }
        }

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/user'), $filename);
            $user->profile_image = 'images/user/' . $filename;
        }

        $user->save();

        return Redirect::route('profile')->with('success', 'Profile information updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
