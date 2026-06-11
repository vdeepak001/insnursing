<?php

use App\Enums\CourseTestType;
use App\Enums\PaymentStatus;
use App\Models\CourseDetail;
use App\Models\CourseTestAttempt;
use App\Models\Order;
use App\Models\User;
use App\Services\ResultsReportService;

it('defaults results date filters to the current month', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);

    $response = $this->actingAs($admin)->get(route('admin.results.index'));

    $response->assertSuccessful();
    $response->assertSee('Results', false);
    $response->assertSee('Module Name', false);
    $response->assertSee('Final 2', false);
    $response->assertSee('value="'.now()->startOfMonth()->toDateString().'"', false);
    $response->assertSee('value="'.now()->endOfMonth()->toDateString().'"', false);
});

it('shows purchased modules and completion counts on the results page', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);
    $learner = User::factory()->create(['role_type' => 'user']);
    $course = CourseDetail::create(['couse_name' => 'Results Module Alpha', 'active_status' => 1]);

    Order::factory()->create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'payment_status' => PaymentStatus::Completed,
        'created_at' => now(),
    ]);

    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Pre->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'started_at' => now(),
        'completed_at' => now(),
    ]);

    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Mock->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'started_at' => now(),
        'completed_at' => now(),
    ]);

    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Final->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'started_at' => now()->subHour(),
        'completed_at' => now()->subHour(),
    ]);

    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Final->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'started_at' => now(),
        'completed_at' => now(),
    ]);

    $response = $this->actingAs($admin)->get(route('admin.results.index'));

    $response->assertSuccessful();
    $response->assertSee('Results Module Alpha', false);
    $response->assertSee('results-chart-data', false);
});

it('filters results by purchase date range', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);
    $learner = User::factory()->create(['role_type' => 'user']);
    $course = CourseDetail::create(['couse_name' => 'Dated Purchase Module', 'active_status' => 1]);

    $order = Order::factory()->create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'payment_status' => PaymentStatus::Completed,
    ]);
    $order->forceFill(['created_at' => now()->subDays(20)])->saveQuietly();

    $currentMonthResponse = $this->actingAs($admin)->get(route('admin.results.index'));
    $currentMonthResponse->assertSuccessful();
    $currentMonthResponse->assertDontSee('Dated Purchase Module', false);

    $rangeResponse = $this->actingAs($admin)->get(route('admin.results.index', [
        'from_date' => now()->subDays(30)->toDateString(),
        'to_date' => now()->toDateString(),
    ]));
    $rangeResponse->assertSuccessful();
    $rangeResponse->assertSee('Dated Purchase Module', false);
});

it('builds module rows and donut chart data from purchases', function () {
    $service = app(ResultsReportService::class);
    $from = now()->startOfMonth();
    $to = now()->endOfMonth();
    $learner = User::factory()->create(['role_type' => 'user']);
    $course = CourseDetail::create(['couse_name' => 'Service Results Module', 'active_status' => 1]);

    Order::factory()->create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'payment_status' => PaymentStatus::Completed,
        'created_at' => now(),
    ]);

    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Pre->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
    ]);

    $rows = $service->moduleRows($from, $to);
    $charts = $service->donutChartData($rows);

    expect($rows)->toHaveCount(1);
    expect($rows[0]['purchased'])->toBe(1);
    expect($rows[0]['pre_test'])->toBe(1);
    expect($rows[0]['mock'])->toBe(0);
    expect($charts['pretest']['completed'])->toBe(1);
    expect($charts['pretest']['not_completed'])->toBe(0);
    expect($charts['pretest']['completed_percentage'])->toBe(100.0);
});

it('redirects legacy test routes to the results page', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);

    $this->actingAs($admin)
        ->get('/admin/tests/pretest')
        ->assertRedirect(route('admin.results.index'));
});

it('allows support role to access results', function () {
    $support = User::factory()->create(['role_type' => 'support']);

    $this->actingAs($support)
        ->get(route('support.results.index'))
        ->assertSuccessful()
        ->assertSee('Results', false);
});

it('redirects frontend users away from results', function () {
    $learner = User::factory()->create(['role_type' => 'user']);

    $this->actingAs($learner)
        ->get(route('admin.results.index'))
        ->assertRedirect(route('login'));
});
