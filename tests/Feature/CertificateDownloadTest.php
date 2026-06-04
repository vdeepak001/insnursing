<?php

use App\Enums\CourseTestType;
use App\Enums\PaymentStatus;
use App\Models\CourseDetail;
use App\Models\CourseTestAttempt;
use App\Models\Order;
use App\Models\User;

it('does not log out staff when opening certificate download from the users list', function () {
    $superAdmin = User::factory()->create(['role_type' => 'superadmin']);
    $learner = User::factory()->create(['role_type' => 'user']);

    $course = CourseDetail::query()->create([
        'couse_name' => 'Certificate Course',
        'description' => 'Test',
        'active_status' => 1,
        'course_code' => 'CERT-01',
    ]);

    $order = Order::factory()->create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'payment_status' => PaymentStatus::Completed,
    ]);

    $this->actingAs($superAdmin)
        ->get(route('certificates.download', $order));

    $this->assertAuthenticatedAs($superAdmin);
});

it('allows staff to download a certificate for a passed module purchase', function () {
    $superAdmin = User::factory()->create(['role_type' => 'superadmin']);
    $learner = User::factory()->create(['role_type' => 'user']);

    $course = CourseDetail::query()->create([
        'couse_name' => 'Passed Module',
        'description' => 'Test',
        'active_status' => 1,
        'course_code' => 'PASS-01',
    ]);

    $order = Order::factory()->create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'payment_status' => PaymentStatus::Completed,
    ]);

    CourseTestAttempt::query()->create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Final,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1, 2, 3],
        'score_percent' => 90,
        'correct_count' => 9,
        'total_questions' => 10,
        'passed' => true,
        'started_at' => $order->created_at->addHour(),
        'completed_at' => now(),
    ]);

    $this->actingAs($superAdmin)
        ->get(route('certificates.download', $order))
        ->assertSuccessful();
});

it('forbids learners from downloading another users certificate', function () {
    $learner = User::factory()->create(['role_type' => 'user']);
    $otherLearner = User::factory()->create(['role_type' => 'user']);

    $course = CourseDetail::query()->create([
        'couse_name' => 'Private Module',
        'description' => 'Test',
        'active_status' => 1,
    ]);

    $order = Order::factory()->create([
        'user_id' => $otherLearner->id,
        'course_detail_id' => $course->id,
        'payment_status' => PaymentStatus::Completed,
    ]);

    $this->actingAs($learner)
        ->get(route('certificates.download', $order))
        ->assertForbidden();
});
