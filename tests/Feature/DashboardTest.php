<?php

use App\Enums\CourseTestType;
use App\Models\CourseDetail;
use App\Models\CourseTestAttempt;
use App\Models\Order;
use App\Models\User;
use App\Services\AdminDashboardService;

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
    $response->assertSee('bg-[#045A5D]', false);
    $response->assertSee('Total Courses', false);
    $response->assertSee('Pretest', false);
    $response->assertSee('Mock Test', false);
    $response->assertSee('Final Average', false);
    $response->assertSee('Test Attempts Overview', false);
    $response->assertSee('This Month', false);
    $response->assertSee('Test Status Distribution', false);
    $response->assertSee('Recent Test Attempts', false);
    $response->assertSee('Top 10 Performing Tests', false);
    $response->assertSee($learner->name, false);
    $response->assertSee('Dashboard Metrics Course', false);
    $response->assertSee('Pre test', false);
});

test('attempts overview groups weekly data for the selected month', function () {
    $course = CourseDetail::create([
        'couse_name' => 'Attempts Overview Course',
        'active_status' => 1,
    ]);

    $learner = User::factory()->create(['role_type' => 'user']);
    $month = now()->startOfMonth();

    $preAttempt = CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Pre->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'started_at' => $month->copy()->day(2),
        'completed_at' => $month->copy()->day(2),
    ]);
    $preAttempt->forceFill([
        'created_at' => $month->copy()->day(2),
        'updated_at' => $month->copy()->day(2),
    ])->save();

    $mockAttempt = CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Mock->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'started_at' => $month->copy()->day(10),
        'completed_at' => $month->copy()->day(10),
    ]);
    $mockAttempt->forceFill([
        'created_at' => $month->copy()->day(10),
        'updated_at' => $month->copy()->day(10),
    ])->save();

    $overview = app(AdminDashboardService::class)->build($month->format('Y-m'))['charts']['attempts_overview'];
    $series = collect($overview['series'])->keyBy('name');

    expect($overview['categories'][0])->toBe($month->copy()->day(1)->displayDate());
    expect($overview['colors'])->toBe(['#107C85', '#1A7F64', '#E68A2E']);
    expect($series['Pre Tests']['data'][0])->toBe(1);
    expect($series['Mock Tests']['data'][1])->toBe(1);
    expect($series['Final Tests']['data'])->each->toBe(0);
});

test('recent attempts show completed for practice tests without pass fail outcome', function () {
    $course = CourseDetail::create([
        'couse_name' => 'Practice Outcome Course',
        'active_status' => 1,
    ]);

    $learner = User::factory()->create(['role_type' => 'user']);

    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Practice->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1, 2],
        'score_percent' => 85.0,
        'started_at' => now()->subHour(),
        'completed_at' => now(),
    ]);

    $recent = collect(app(AdminDashboardService::class)->build()['recent_attempts'])
        ->firstWhere('test_label', 'Practice test');

    expect($recent)->not->toBeNull();
    expect($recent['outcome_label'])->toBe('Completed');
    expect($recent['score'])->toBe('85.0%');
    expect($recent)->toHaveKeys(['completed_at_date', 'completed_at_time']);
    expect($recent['completed_at_time'])->not->toBe('');
});

test('top performing tests returns up to ten highest scoring module and test pairs including practice tests', function () {
    $learner = User::factory()->create(['role_type' => 'user']);

    for ($index = 1; $index <= 12; $index++) {
        $course = CourseDetail::create([
            'couse_name' => "Top Ten Course {$index}",
            'active_status' => 1,
        ]);

        CourseTestAttempt::create([
            'user_id' => $learner->id,
            'course_detail_id' => $course->id,
            'test_type' => CourseTestType::Final->value,
            'status' => CourseTestAttempt::STATUS_COMPLETED,
            'question_ids' => [1],
            'score_percent' => $index * 5,
            'started_at' => now()->subHour(),
            'completed_at' => now(),
        ]);
    }

    // Add a final test with the highest score
    $practiceCourse = CourseDetail::create([
        'couse_name' => 'Top Final Course',
        'active_status' => 1,
    ]);
    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $practiceCourse->id,
        'test_type' => CourseTestType::Final->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'score_percent' => 95.0,
        'started_at' => now()->subHour(),
        'completed_at' => now(),
    ]);
    // Add a second attempt with a lower score for the same final test
    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $practiceCourse->id,
        'test_type' => CourseTestType::Final->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'score_percent' => 80.0,
        'started_at' => now()->subHours(2),
        'completed_at' => now()->subHour(),
    ]);

    $topPerforming = app(AdminDashboardService::class)->build()['top_performing'];

    expect($topPerforming)->toHaveCount(10);
    expect($topPerforming[0]['course_name'])->toBe('Top Final Course');
    expect($topPerforming[0]['test_label'])->toBe('Final test');
    expect($topPerforming[0]['average_score'])->toBe(95.0);
    expect($topPerforming[0]['attempt_count'])->toBe(2);
    expect($topPerforming[1]['course_name'])->toBe('Top Ten Course 12');
    expect($topPerforming[1]['average_score'])->toBe(60.0);
    expect($topPerforming[1]['attempt_count'])->toBe(1);
});

test('recent attempts show date and time on separate lines in dashboard', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);
    $learner = User::factory()->create(['role_type' => 'user', 'name' => 'Date Split Learner']);
    $course = CourseDetail::create([
        'couse_name' => 'Date Split Course',
        'active_status' => 1,
    ]);

    $completedAt = now()->setTime(10, 13);

    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Pre->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'score_percent' => 80.0,
        'started_at' => $completedAt->copy()->subHour(),
        'completed_at' => $completedAt,
    ]);

    $response = $this->actingAs($admin)->get(route('admin.dashboard'));

    $response->assertSuccessful();
    $response->assertSee($completedAt->displayDate(), false);
    $response->assertSee($completedAt->format('g:i A'), false);
    $response->assertSee('dashboardStatusChart', false);
});

test('recent attempts show passed or failed only for final tests with pass outcome', function () {
    $course = CourseDetail::create([
        'couse_name' => 'Final Outcome Course',
        'active_status' => 1,
    ]);

    $learner = User::factory()->create(['role_type' => 'user']);

    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Final->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'score_percent' => 70.0,
        'passed' => true,
        'started_at' => now()->subHour(),
        'completed_at' => now(),
    ]);

    CourseTestAttempt::create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Final->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'score_percent' => 55.0,
        'passed' => false,
        'started_at' => now()->subHours(2),
        'completed_at' => now()->subHour(),
    ]);

    $recent = collect(app(AdminDashboardService::class)->build()['recent_attempts'])
        ->where('test_label', 'Final test');

    expect($recent->firstWhere('score', '70.0%')['outcome_label'])->toBe('Passed');
    expect($recent->firstWhere('score', '55.0%')['outcome_label'])->toBe('Failed');
});

test('status distribution includes all statuses with design palette colors', function () {
    $course = CourseDetail::create([
        'couse_name' => 'Status Distribution Course',
        'active_status' => 1,
    ]);

    $completedLearner = User::factory()->create(['role_type' => 'user']);
    $activeLearner = User::factory()->create(['role_type' => 'user']);
    $expiredLearner = User::factory()->create(['role_type' => 'user']);
    $pendingLearner = User::factory()->create(['role_type' => 'user']);

    CourseTestAttempt::create([
        'user_id' => $completedLearner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Pre->value,
        'status' => CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1],
        'started_at' => now()->subHours(2),
        'completed_at' => now()->subHour(),
    ]);

    CourseTestAttempt::create([
        'user_id' => $activeLearner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Mock->value,
        'status' => CourseTestAttempt::STATUS_IN_PROGRESS,
        'question_ids' => [1],
        'started_at' => now()->subMinutes(10),
    ]);

    CourseTestAttempt::create([
        'user_id' => $expiredLearner->id,
        'course_detail_id' => $course->id,
        'test_type' => CourseTestType::Final->value,
        'status' => CourseTestAttempt::STATUS_IN_PROGRESS,
        'question_ids' => [1],
        'started_at' => now()->subMinutes(CourseTestAttempt::EXAM_TIME_LIMIT_MINUTES + 5),
    ]);

    Order::factory()->create([
        'user_id' => $pendingLearner->id,
        'course_detail_id' => $course->id,
    ]);

    $distribution = collect(app(AdminDashboardService::class)->build()['charts']['status_distribution'])
        ->keyBy('label');

    expect($distribution->keys()->all())->toBe(['Completed', 'In progress', 'Pending', 'Expired']);
    expect($distribution['Completed']['count'])->toBe(1);
    expect($distribution['In progress']['count'])->toBe(1);
    expect($distribution['Pending']['count'])->toBe(1);
    expect($distribution['Expired']['count'])->toBe(1);
    expect($distribution['Completed']['color'])->toBe('#009688');
    expect($distribution['In progress']['color'])->toBe('#2196F3');
    expect($distribution['Pending']['color'])->toBe('#FF9800');
    expect($distribution['Expired']['color'])->toBe('#F44336');
});

test('support role dashboard hides course metrics but shows assessment data', function () {
    $support = User::factory()->create(['role_type' => 'support']);

    $response = $this->actingAs($support)->get(route('support.dashboard'));

    $response->assertSuccessful();
    $response->assertDontSee('Total Courses', false);
    $response->assertSee('Total Users', false);
    $response->assertSee('Pretest', false);
});
