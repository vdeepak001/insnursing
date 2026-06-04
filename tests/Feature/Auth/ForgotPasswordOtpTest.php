<?php

use App\Mail\FrontendUserPasswordMail;
use App\Mail\PretestOtpMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

beforeEach(function () {
    Http::fake([
        'https://www.smsjust.com/*' => Http::response('OK', 200),
    ]);
});

it('sends forgot password otp via email and sms', function () {
    Mail::fake();

    $user = User::factory()->create([
        'role_type' => 'user',
        'email' => 'learner@example.com',
        'phone' => '9876543210',
    ]);

    $this->post(route('frontend.password.send-otp'), [
        'email' => $user->email,
        'form_type' => 'forgot',
    ])
        ->assertSessionHasNoErrors()
        ->assertSessionHas('forgot_otp_sent', true)
        ->assertSessionHas('success');

    Mail::assertSent(PretestOtpMail::class, function (PretestOtpMail $mail) use ($user): bool {
        return $mail->hasTo($user->email) && $mail->testType === 'forgot';
    });

    Http::assertSent(fn ($request): bool => str_contains($request->url(), 'urlsms.php')
        && $request['dest_mobileno'] === '919876543210');
});

it('verifies forgot password otp and emails temporary password', function () {
    Mail::fake();

    $user = User::factory()->create([
        'role_type' => 'user',
        'email' => 'learner@example.com',
        'phone' => '9876543210',
    ]);

    $this->post(route('frontend.password.send-otp'), [
        'email' => $user->email,
        'form_type' => 'forgot',
    ])->assertSessionHasNoErrors();

    $sessionKey = 'forgot_password_otp_'.hash('sha256', strtolower($user->email));
    $otp = session($sessionKey)['code'];

    $this->post(route('frontend.password.verify'), [
        'email' => $user->email,
        'otp' => $otp,
        'form_type' => 'forgot',
    ])
        ->assertSessionHasNoErrors()
        ->assertSessionHas('success');

    $user->refresh();

    expect($user->password_raw)->toBeString()
        ->and(strlen($user->password_raw))->toBe(10)
        ->and(Hash::check($user->password_raw, $user->password))->toBeTrue();

    Mail::assertSent(FrontendUserPasswordMail::class, function (FrontendUserPasswordMail $mail) use ($user): bool {
        return $mail->hasTo($user->email)
            && $mail->type === 'forgot'
            && $mail->generatedPassword === $user->password_raw;
    });
});
