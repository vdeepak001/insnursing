<?php

use App\Helpers\MenuHelper;
use App\Models\User;
use Tests\TestCase;

test('login screen can be rendered', function () {
    /** @var TestCase $this */
    $response = $this->get(route('login'));

    $response->assertSuccessful();
    $response->assertSee('Sign In', false);
});

test('staff login screen can be rendered', function () {
    /** @var TestCase $this */
    $response = $this->get(route('login'));

    $response->assertSuccessful();
    $response->assertSee('Sign In', false);
});

test('sign up screen can be rendered', function () {
    /** @var TestCase $this */
    $response = $this->get('/register');

    $response->assertSuccessful();
    $response->assertSee('Sign Up', false);
});

test('users can authenticate using the login screen', function () {
    /** @var TestCase $this */
    $user = User::factory()->create([
        'role_type' => 'superadmin',
    ]);

    $response = $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $prefix = MenuHelper::getPrefixForRole($user->role_type);
    expect($prefix)->not->toBeNull();
    $response->assertRedirect(route($prefix.'.dashboard', absolute: false));
});

test('users can not authenticate with invalid password', function () {
    /** @var TestCase $this */
    $user = User::factory()->create([
        'role_type' => 'superadmin',
    ]);

    $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('users can logout', function () {
    /** @var TestCase $this */
    $user = User::factory()->create([
        'role_type' => 'superadmin',
    ]);
    /** @var User $user */
    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect(route('login'));
});

test('frontend users can logout and redirect to home', function () {
    /** @var TestCase $this */
    $user = User::factory()->create([
        'role_type' => 'user',
    ]);
    /** @var User $user */
    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect('/');
});

test('frontend user can not login from dashboard login endpoint', function () {
    /** @var TestCase $this */
    $user = User::factory()->create([
        'role_type' => 'user',
    ]);

    $response = $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertGuest();
    $response->assertSessionHasErrors(['email']);
});

test('frontend user can login from frontend login endpoint', function () {
    /** @var TestCase $this */
    $user = User::factory()->create([
        'role_type' => 'user',
    ]);

    $response = $this->post('/frontend-login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('home', absolute: false));
});
