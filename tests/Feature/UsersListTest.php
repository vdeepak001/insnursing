<?php

use App\Models\User;

it('allows super admin to view the frontend users list', function () {
    $superAdmin = User::factory()->create(['role_type' => 'superadmin']);
    $customer = User::factory()->create([
        'role_type' => 'user',
        'name' => 'Learner One',
    ]);

    $response = $this->actingAs($superAdmin)->get(route('super-admin.users-list.index'));

    $response->assertSuccessful();
    $response->assertSee('Learner One');
    $response->assertSee($customer->email);
});

it('does not list staff accounts on the frontend users list', function () {
    $superAdmin = User::factory()->create(['role_type' => 'superadmin']);
    $admin = User::factory()->create([
        'role_type' => 'admin',
        'name' => 'Staff Admin Person',
    ]);

    $response = $this->actingAs($superAdmin)->get(route('super-admin.users-list.index'));

    $response->assertSuccessful();
    $response->assertDontSee('Staff Admin Person');
});

it('allows support role to view the frontend users list', function () {
    $support = User::factory()->create(['role_type' => 'support']);

    $this->actingAs($support)->get(route('support.users-list.index'))->assertSuccessful();
});

it('includes performance analysis chart modes for all modules and single module views', function () {
    $superAdmin = User::factory()->create(['role_type' => 'superadmin']);

    $response = $this->actingAs($superAdmin)->get(route('super-admin.users-list.index'));

    $response->assertSuccessful();
    $response->assertSee('buildPerformanceDonutOptions', false);
    $response->assertSee('buildPerformanceBarOptions', false);
    $response->assertSee('All Modules', false);
});

it('redirects frontend learners away from the staff users list', function () {
    $customer = User::factory()->create(['role_type' => 'user']);

    $this->actingAs($customer)
        ->get(route('super-admin.users-list.index'))
        ->assertRedirect(route('login'));
});

it('returns scores for multiple final test attempts in purchased courses endpoint', function () {
    $superAdmin = User::factory()->create(['role_type' => 'superadmin']);
    $user = User::factory()->create(['role_type' => 'user']);
    $course = \App\Models\CourseDetail::create(['couse_name' => 'BLS Course', 'active_status' => 1]);

    $order = \App\Models\Order::factory()->create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'payment_status' => \App\Enums\PaymentStatus::Completed,
        'start_date' => now()->subDays(10),
        'end_date' => now()->addDays(50),
        'created_at' => now()->subDays(10),
    ]);

    \App\Models\CourseTestAttempt::create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'test_type' => \App\Enums\CourseTestType::Final->value,
        'status' => \App\Models\CourseTestAttempt::STATUS_COMPLETED,
        'score_percent' => 50,
        'passed' => false,
        'question_ids' => json_encode([]),
        'started_at' => now()->subDays(5),
        'completed_at' => now()->subDays(5),
    ]);

    \App\Models\CourseTestAttempt::create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'test_type' => \App\Enums\CourseTestType::Final->value,
        'status' => \App\Models\CourseTestAttempt::STATUS_COMPLETED,
        'score_percent' => 86,
        'passed' => true,
        'question_ids' => json_encode([]),
        'started_at' => now()->subDays(2),
        'completed_at' => now()->subDays(2),
    ]);

    $response = $this->actingAs($superAdmin)
        ->get(route('super-admin.users-list.purchased-courses', ['userId' => $user->id]));

    $response->assertSuccessful();
    $response->assertJsonPath('orders.0.scores.final_1', 50);
    $response->assertJsonPath('orders.0.scores.final_2', 86);
});
