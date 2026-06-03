<?php

use App\Enums\CourseTestType;
use App\Models\CourseDetail;
use App\Models\CourseTestAttempt;
use App\Models\User;

it('shows tests submenu pages for admin with filtered attempts', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);
    $learner = User::factory()->create(['role_type' => 'user', 'name' => 'Test Learner Menu']);
    $course = CourseDetail::create([
        'couse_name' => 'Menu Test Module',
        'active_status' => 1,
    ]);

    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Pre->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'score_percent' => 88,
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

    $pretestResponse = $this->actingAs($admin)->get(route('admin.tests.index', ['testSegment' => 'pretest']));
    $pretestResponse->assertSuccessful();
    $pretestResponse->assertSee('Pretest', false);
    $pretestResponse->assertSee('Test Learner Menu', false);
    $pretestResponse->assertSee('Menu Test Module', false);
    $pretestResponse->assertSee('Passed', false);

    $mockResponse = $this->actingAs($admin)->get(route('admin.tests.index', ['testSegment' => 'mock-test']));
    $mockResponse->assertSuccessful();
    $mockResponse->assertSee('Mock Test', false);
    $mockResponse->assertSee('In progress', false);

    $resultsResponse = $this->actingAs($admin)->get(route('admin.tests.index', ['testSegment' => 'results']));
    $resultsResponse->assertSuccessful();
    $resultsResponse->assertSee('Results', false);
    $resultsResponse->assertSee('Pre test', false);
});

it('allows support role to access test attempt listings', function () {
    $support = User::factory()->create(['role_type' => 'support']);

    $this->actingAs($support)
        ->get(route('support.tests.index', ['testSegment' => 'final-test']))
        ->assertSuccessful()
        ->assertSee('Final Test', false);
});

it('redirects frontend users away from test listings', function () {
    $learner = User::factory()->create(['role_type' => 'user']);

    $this->actingAs($learner)
        ->get(route('admin.tests.index', ['testSegment' => 'pretest']))
        ->assertRedirect(route('login'));
});
