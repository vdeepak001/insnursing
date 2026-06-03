<?php

use App\Enums\CourseTestType;
use App\Models\CourseDetail;
use App\Models\CourseTestAttempt;
use App\Models\User;

test('frontend users are redirected away from dashboard', function () {
    $user = User::factory()->create(['role_type' => 'user']);

    $this->actingAs($user)
        ->get(route('dashboard'))
        ->assertRedirect(route('profile'));
});

test('admin dashboard shows platform and assessment metrics', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);
    $learner = User::factory()->create(['role_type' => 'user', 'active_status' => 1]);
    $course = CourseDetail::create([
        'couse_name' => 'Dashboard Metrics Course',
        'active_status' => 1,
    ]);

    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Pre->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1, 2],
        'score_percent' => 92.5,
        'passed' => true,
        'started_at' => now()->subHour(),
        'completed_at' => now(),
    ]);

    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Mock->value,
        'status' => CourseTestAttempt::STATUS_IN_PROGRESS,
        'question_ids' => [1],
        'started_at' => now(),
    ]);

    $response = $this->actingAs($admin)->get(route('admin.dashboard'));

    $response->assertSuccessful();
    $response->assertSee('Total Courses', false);
    $response->assertSee('Pretest', false);
    $response->assertSee('Mock Test', false);
    $response->assertSee('Final Test', false);
    $response->assertSee('Total Attempts Overview', false);
    $response->assertSee('Test Status Distribution', false);
    $response->assertSee('Recent Test Attempts', false);
    $response->assertSee('Top Performing Tests', false);
    $response->assertSee($learner->name, false);
    $response->assertSee('Dashboard Metrics Course', false);
    $response->assertSee('Pre test', false);
});

test('support role dashboard hides course metrics but shows assessment data', function () {
    $support = User::factory()->create(['role_type' => 'support']);

    $response = $this->actingAs($support)->get(route('support.dashboard'));

    $response->assertSuccessful();
    $response->assertDontSee('Total Courses', false);
    $response->assertSee('Total Users', false);
    $response->assertSee('Pretest', false);
});
