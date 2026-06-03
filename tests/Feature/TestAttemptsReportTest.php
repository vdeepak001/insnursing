<?php

use App\Enums\CourseTestType;
use App\Models\CourseDetail;
use App\Models\CourseTestAttempt;
use App\Models\User;
use App\Services\TestAttemptsReportService;

it('defaults date filters to today and shows module completion analytics', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);
    $learner = User::factory()->create(['role_type' => 'user', 'name' => 'Analytics Learner']);

    $courseA = CourseDetail::create(['couse_name' => 'Alpha Module', 'active_status' => 1]);
    $courseB = CourseDetail::create(['couse_name' => 'Beta Module', 'active_status' => 1]);

    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $courseA->id,
        'test_type' => CourseTestType::Pre->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'passed' => true,
        'score_percent' => 90,
        'created_at' => now(),
        'started_at' => now(),
        'completed_at' => now(),
    ]);

    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $courseB->id,
        'test_type' => CourseTestType::Pre->value,
        'status' => CourseTestAttempt::STATUS_IN_PROGRESS,
        'question_ids' => [1],
        'created_at' => now(),
        'started_at' => now(),
    ]);

    $response = $this->actingAs($admin)->get(route('admin.tests.index', ['testSegment' => 'pretest']));

    $response->assertSuccessful();
    $response->assertSee('Module completion', false);
    $response->assertSee('Completion by module', false);
    $response->assertSee('Alpha Module', false);
    $response->assertSee('Beta Module', false);
    $response->assertSee('50.0%', false);
    $response->assertSee('test-attempts-chart-data', false);
    $response->assertSee('value="'.now()->toDateString().'"', false);
});

it('filters module stats by from and to date', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);
    $learner = User::factory()->create(['role_type' => 'user']);
    $course = CourseDetail::create(['couse_name' => 'Dated Module', 'active_status' => 1]);

    $attempt = CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Mock->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'passed' => true,
        'started_at' => now()->subDays(10),
        'completed_at' => now()->subDays(10),
    ]);
    $attempt->forceFill(['created_at' => now()->subDays(10)])->saveQuietly();

    $todayResponse = $this->actingAs($admin)->get(route('admin.tests.index', [
        'testSegment' => 'mock-test',
        'from_date' => now()->toDateString(),
        'to_date' => now()->toDateString(),
    ]));
    $todayResponse->assertSuccessful();
    $todayResponse->assertSee('No module activity for the selected date range', false);

    $rangeResponse = $this->actingAs($admin)->get(route('admin.tests.index', [
        'testSegment' => 'mock-test',
        'from_date' => now()->subDays(14)->toDateString(),
        'to_date' => now()->toDateString(),
    ]));
    $rangeResponse->assertSuccessful();
    $rangeResponse->assertSee('Dated Module', false);
    $rangeResponse->assertSee('100.0%', false);
});

it('shows results page module breakdown for pretest mock and final', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);
    $learner = User::factory()->create(['role_type' => 'user']);
    $course = CourseDetail::create(['couse_name' => 'Results Module', 'active_status' => 1]);

    foreach ([CourseTestType::Pre, CourseTestType::Mock, CourseTestType::Final] as $type) {
        CourseTestAttempt::create([
            'user_id' => $learner->id,
            'course_detail_id' => $course->id,
            'test_type' => $type->value,
            'status' => CourseTestAttempt::STATUS_COMPLETED,
            'question_ids' => [1],
            'passed' => true,
            'score_percent' => 85,
            'started_at' => now(),
            'completed_at' => now(),
        ]);
    }

    $response = $this->actingAs($admin)->get(route('admin.tests.index', ['testSegment' => 'results']));

    $response->assertSuccessful();
    $response->assertSee('Module results by test type', false);
    $response->assertSee('Completion comparison by module', false);
    $response->assertSee('Results Module', false);
    $response->assertSee('100.0%', false);
    $response->assertSee('test-attempts-chart-data', false);
});

it('calculates module completion percentages in the report service', function () {
    $service = app(TestAttemptsReportService::class);
    $from = now()->startOfDay();
    $to = now()->endOfDay();

    $course = CourseDetail::create(['couse_name' => 'Service Module', 'active_status' => 1]);
    $user = User::factory()->create(['role_type' => 'user']);

    CourseTestAttempt::create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Final->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'passed' => false,
        'created_at' => now(),
    ]);
    CourseTestAttempt::create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Final->value,
        'status' => CourseTestAttempt::STATUS_IN_PROGRESS,
        'question_ids' => [1],
        'created_at' => now(),
    ]);

    $query = $service->baseQuery(CourseTestType::Final, $from, $to);
    $stats = $service->moduleCompletionStats($query);

    expect($stats)->toHaveCount(1);
    expect($stats[0]['completion_percentage'])->toBe(50.0);
    expect($stats[0]['pass_percentage'])->toBe(0.0);
});

it('builds per-module pretest mock and final completion in results report', function () {
    $service = app(TestAttemptsReportService::class);
    $from = now()->startOfDay();
    $to = now()->endOfDay();
    $user = User::factory()->create(['role_type' => 'user']);
    $course = CourseDetail::create(['couse_name' => 'Tri Test Module', 'active_status' => 1]);

    CourseTestAttempt::create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Pre->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
    ]);
    CourseTestAttempt::create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Mock->value,
        'status' => CourseTestAttempt::STATUS_IN_PROGRESS,
        'question_ids' => [1],
    ]);

    $results = $service->moduleResultsByTestType($service->sequencedTestsQuery($from, $to));

    expect($results)->toHaveCount(1);
    expect($results[0]['pretest']['completion_percentage'])->toBe(100.0);
    expect($results[0]['mock']['completion_percentage'])->toBe(0.0);
    expect($results[0]['final']['completion_percentage'])->toBe(0.0);
});
