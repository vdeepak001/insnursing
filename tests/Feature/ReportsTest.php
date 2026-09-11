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
    $response->assertSee('UID', false);
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
    $response->assertSee('UID', false);
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

it('renders the exact uid from users table in the user performance report', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);
    $state = State::create(['name' => 'Goa', 'status' => 'active']);
    $stateCouncil = StateCouncil::create([
        'state_id' => $state->id,
        'council_name' => 'Goa Council',
        'active_status' => true,
    ]);
    $course = CourseDetail::create(['couse_name' => 'UID Test Module', 'active_status' => 1]);
    $course->stateCouncils()->attach($stateCouncil->id);

    $learner = User::factory()->create([
        'role_type' => 'user',
        'state' => 'Goa',
        'uid' => 'MYCUSTOMUID99',
    ]);

    \App\Models\CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'state_council_id' => $stateCouncil->id,
        'test_type' => \App\Enums\CourseTestType::Final,
        'score_percent' => 85,
        'passed' => true,
        'status' => \App\Models\CourseTestAttempt::STATUS_COMPLETED,
        'completed_at' => now(),
        'question_ids' => '[]',
    ]);

    $response = $this->actingAs($admin)->get(route('admin.reports.index', [
        'state_id' => $state->id,
    ]));

    $response->assertSuccessful();
    $response->assertSee('MYCUSTOMUID99');
});

