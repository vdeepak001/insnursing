<?php

use App\Models\State;
use App\Models\User;

beforeEach(function () {
    State::create(['name' => 'Maharashtra', 'status' => 'active']);
    State::create(['name' => 'Tamil Nadu', 'status' => 'active']);
});

it('prevents registration with duplicate UID for Maharashtra state', function () {
    User::factory()->create([
        'state' => 'Maharashtra',
        'uid' => '0000100430',
        'role_type' => 'user',
    ]);

    $response = $this->post(route('frontend.register'), [
        'name' => 'New User',
        'state' => 'Maharashtra',
        'qualification' => 'BSc Nursing',
        'date_of_birth' => '1995-05-15',
        'email' => 'newuser@example.com',
        'phone' => '9876543210',
        'rn_number' => 'RN123456',
        'uid' => '0000100430',
    ]);

    $response->assertSessionHasErrors(['uid' => 'This UID is already registered for Maharashtra.'], null, 'frontendRegister');
});

it('allows registration with unique UID for Maharashtra state', function () {
    User::factory()->create([
        'state' => 'Maharashtra',
        'uid' => '0000100430',
        'role_type' => 'user',
    ]);

    $response = $this->post(route('frontend.register'), [
        'name' => 'Unique User',
        'state' => 'Maharashtra',
        'qualification' => 'BSc Nursing',
        'date_of_birth' => '1995-05-15',
        'email' => 'uniqueuser@example.com',
        'phone' => '9876543211',
        'rn_number' => 'RN123457',
        'uid' => '0000100999',
    ]);

    $response->assertSessionHasNoErrors();
    $newUser = User::query()->whereNotNull('email')->get()->first(function ($u) {
        return $u->email === 'uniqueuser@example.com';
    });
    expect($newUser)->not->toBeNull();
});

it('allows duplicate UID for non-Maharashtra states during registration', function () {
    User::factory()->create([
        'state' => 'Tamil Nadu',
        'uid' => '0000100430',
        'role_type' => 'user',
    ]);

    $response = $this->post(route('frontend.register'), [
        'name' => 'TN User',
        'state' => 'Tamil Nadu',
        'qualification' => 'BSc Nursing',
        'date_of_birth' => '1995-05-15',
        'email' => 'tnuser@example.com',
        'phone' => '9876543212',
        'rn_number' => 'RN123458',
        'uid' => '0000100430',
    ]);

    $response->assertSessionHasNoErrors();
});

it('prevents profile update with duplicate UID for Maharashtra state', function () {
    User::factory()->create([
        'state' => 'Maharashtra',
        'uid' => '0000100430',
        'role_type' => 'user',
    ]);

    $user2 = User::factory()->create([
        'state' => 'Maharashtra',
        'uid' => '0000100431',
        'role_type' => 'user',
    ]);

    $response = $this->actingAs($user2)->patch(route('profile.update'), [
        'state' => 'Maharashtra',
        'uid' => '0000100430',
    ]);

    $response->assertSessionHasErrors(['uid' => 'This UID is already registered for Maharashtra.']);
});
