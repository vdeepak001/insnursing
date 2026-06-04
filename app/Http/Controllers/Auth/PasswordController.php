<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\FrontendUserPasswordMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $user = $request->user();

        $user->update([
            'password' => Hash::make($validated['password']),
            'password_raw' => $validated['password'],
        ]);

        if ($user->role_type === 'user' && filled($user->email)) {
            try {
                Mail::to($user->email)->send(
                    new FrontendUserPasswordMail($user, $validated['password'], 'updated')
                );
            } catch (\Exception $e) {
                report($e);
            }
        }

        return back()->with('success', 'Password changed successfully.');
    }
}
