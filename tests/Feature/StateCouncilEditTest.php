<?php

use App\Models\State;
use App\Models\StateCouncil;
use App\Models\User;

test('admin can view state council edit page with colored test split up boxes', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);
    $state = State::query()->create([
        'name' => 'Kerala',
        'status' => 'active',
    ]);
    $stateCouncil = StateCouncil::query()->create([
        'state_id' => $state->id,
        'council_name' => 'Kerala Nursing Council',
        'active_status' => true,
    ]);

    $response = $this->actingAs($admin)->get(route('admin.state-councils.edit', $stateCouncil));

    $response->assertSuccessful();
    $response->assertSee('Pre Test', false);
    $response->assertSee('Mock Test', false);
    $response->assertSee('Final Test', false);
    $response->assertSee('bg-impetus-light-teal text-impetus-teal', false);
    $response->assertSee('from-impetus-teal to-impetus-teal-hover', false);
    $response->assertSee('from-impetus-orange to-orange-500', false);
});
