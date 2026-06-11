<?php

use App\Enums\CourseTestType;
use App\Models\CourseDetail;
use App\Models\CourseTestAttempt;
use App\Models\User;
use App\Services\TestAttemptsReportService;

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
