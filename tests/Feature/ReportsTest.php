<?php

use App\Models\CourseDetail;
use App\Models\State;
use App\Models\StateCouncil;
use App\Models\User;

it('shows overall reports summary on the reports page', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);
    CourseDetail::create(['couse_name' => 'Overall Report Module', 'active_status' => 1]);

    $response = $this->actingAs($admin)->get(route('admin.reports.index'));

    $response->assertSuccessful();
    $response->assertSee('Reports', false);
    $response->assertSee('Registered Users', false);
    $response->assertSee('Modules Completed', false);
    $response->assertSee('Overall Report Module', false);
    $response->assertSee('Unique ID', false);
    $response->assertSee('All Modules', false);
});

it('shows state report and user performance on the same page when a state is selected', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);
    $state = State::create(['name' => 'Tamil Nadu', 'status' => 'active']);
    $stateCouncil = StateCouncil::create([
        'state_id' => $state->id,
        'council_name' => 'Tamil Nadu Council',
        'active_status' => true,
    ]);
    $course = CourseDetail::create(['couse_name' => 'State Report Module', 'active_status' => 1]);
    $course->stateCouncils()->attach($stateCouncil->id);

    $response = $this->actingAs($admin)->get(route('admin.reports.index', [
        'state_id' => $state->id,
    ]));

    $response->assertSuccessful();
    $response->assertSee('Report: Tamil Nadu', false);
    $response->assertSee('State Report Module', false);
    $response->assertSee('Unique ID', false);
    $response->assertSee('Pre Test', false);
    $response->assertSee('All Modules', false);
    $response->assertSee('Download Excel', false);
});

it('redirects legacy user performance route to the reports page', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);
    $state = State::create(['name' => 'Kerala', 'status' => 'active']);

    $this->actingAs($admin)
        ->get(route('admin.reports.user-performance', [
            'state_id' => $state->id,
            'from_date' => '2026-01-01',
        ]))
        ->assertRedirect(route('admin.reports.index', [
            'state_id' => $state->id,
            'from_date' => '2026-01-01',
        ]));
});
