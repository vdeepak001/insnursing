<?php

use App\Mail\FrontendUserPasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

test('password can be updated', function () {
    Mail::fake();

    $user = User::factory()->create([
        'role_type' => 'user',
    ]);

    $response = $this
        ->actingAs($user)
        ->from('/change-password')
        ->put('/password', [
            'current_password' => 'password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/change-password');

    $this->assertTrue(Hash::check('new-password', $user->refresh()->password));
    expect($user->password_raw)->toBe('new-password');

    Mail::assertSent(FrontendUserPasswordMail::class, function (FrontendUserPasswordMail $mail) use ($user): bool {
        return $mail->hasTo($user->email)
            && $mail->generatedPassword === 'new-password'
            && $mail->type === 'updated';
    });
});

test('frontend user receives login credentials email when password is updated', function () {
    Mail::fake();

    $user = User::factory()->create([
        'role_type' => 'user',
        'email' => 'jamuna@healthcareskill.com',
        'unique_sequence_number' => '2606000006',
    ]);

    $this
        ->actingAs($user)
        ->from('/change-password')
        ->put('/password', [
            'current_password' => 'password',
            'password' => 'Password123',
            'password_confirmation' => 'Password123',
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect('/change-password');

    Mail::assertSent(FrontendUserPasswordMail::class, function (FrontendUserPasswordMail $mail) use ($user): bool {
        return $mail->hasTo('jamuna@healthcareskill.com')
            && $mail->user->is($user)
            && $mail->generatedPassword === 'Password123'
            && $mail->type === 'updated';
    });
});

test('correct password must be provided to update password', function () {
    $user = User::factory()->create([
        'role_type' => 'user',
    ]);

    $response = $this
        ->actingAs($user)
        ->from('/change-password')
        ->put('/password', [
            'current_password' => 'wrong-password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

    $response
        ->assertSessionHasErrorsIn('updatePassword', 'current_password')
        ->assertRedirect('/change-password');
});
