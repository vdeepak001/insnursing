<?php

use App\Models\CourseDetail;
use App\Models\CourseMaterial;
use App\Models\CourseTitle;
use App\Models\State;
use App\Models\StateCouncil;
use App\Models\User;

it('returns a successful response for the CNE modules listing', function () {
    $response = $this->get(route('cne.modules'));

    $response->assertSuccessful();
    $response->assertSee('CNE Modules', false);
    $response->assertSee('Online Continuing Nursing Education Modules', false);
});

it('lists active courses with module cards and course titles', function () {
    CourseDetail::create([
        'couse_name' => 'Listing Test Course',
        'description' => 'Test description for listing.',
        'active_status' => 1,
    ]);

    $response = $this->get(route('cne.modules'));

    $response->assertSuccessful();
    $response->assertSee('Listing Test Course', false);
    $response->assertSee('View Module', false);
    $response->assertSee('Features of Online CNE Modules', false);
});

it('shows only state council assigned courses for authenticated frontend users', function () {
    $mp = State::query()->create([
        'name' => 'Madhya Pradesh',
        'status' => 'active',
    ]);

    $tn = State::query()->create([
        'name' => 'Tamil Nadu',
        'status' => 'active',
    ]);

    $mpCourse = CourseDetail::create([
        'couse_name' => 'MP Course',
        'description' => 'Test',
        'active_status' => 1,
        'sequence' => 1,
    ]);

    $tnCourse = CourseDetail::create([
        'couse_name' => 'TN Course',
        'description' => 'Test',
        'active_status' => 1,
        'sequence' => 2,
    ]);

    $mpCouncil = StateCouncil::query()->create([
        'state_id' => $mp->id,
        'council_name' => 'MP Nursing Council',
        'active_status' => true,
    ]);
    $mpCouncil->courseDetails()->attach($mpCourse->id);

    $tnCouncil = StateCouncil::query()->create([
        'state_id' => $tn->id,
        'council_name' => 'TN Nursing Council',
        'active_status' => true,
    ]);
    $tnCouncil->courseDetails()->attach($tnCourse->id);

    $user = User::factory()->create([
        'role_type' => 'user',
        'state' => 'Madhya Pradesh',
    ]);

    $response = $this->actingAs($user)->get(route('cne.modules'));

    $response->assertSuccessful();
    $response->assertSee('MP Course', false);
    $response->assertDontSee('TN Course', false);
});

it('shows an active course detail page with module content', function () {
    $course = CourseDetail::create([
        'couse_name' => 'First Aid',
        'description' => "Learn emergency basics.\n\nStay confident in care.",
        'qa_content' => 'Questions and answers for deeper learning.',
        'practice_content' => 'Level I–III multiple choice practice.',
        'active_status' => 1,
        'sequence' => 1,
    ]);

    $response = $this->get(route('cne.modules.show', $course));

    $response->assertSuccessful();
    $response->assertSee('First Aid', false);
    $response->assertSee('What you will learn in First Aid?', false);
    $response->assertSee('Learning Materials', false);
    $response->assertSee('Practice Test', false);
    $response->assertSee('Our learning resources for Online Continuing Nursing Education', false);
    $response->assertSee('Buy now', false);
});

it('shows learning materials subtitle and original file names on course detail page', function () {
    $course = CourseDetail::create([
        'couse_name' => 'Critical Care',
        'description' => 'Course content',
        'active_status' => 1,
    ]);

    $courseTitle = CourseTitle::create([
        'course_id' => $course->id,
        'title_name' => 'Emergency Management',
        'active_status' => true,
    ]);

    CourseMaterial::create([
        'course_id' => $course->id,
        'course_title_id' => $courseTitle->id,
        'description' => null,
        'attachment' => ['materials/1711111111_sample-guide.pdf', 'materials/1711111112_care-plan.pptx'],
        'active_status' => true,
    ]);

    $response = $this->get(route('cne.modules.show', $course));

    $response->assertSuccessful();
    $response->assertSee('Learning Resources', false);
    $response->assertDontSee('sample-guide.pdf', false);

    $materialsPageResponse = $this->get(route('cne.modules.materials', $course));
    $materialsPageResponse->assertSuccessful();
    $materialsPageResponse->assertSee('Learning Materials', false);
    $materialsPageResponse->assertSee('Emergency Management', false);
    $materialsPageResponse->assertSee('sample-guide.pdf', false);
    $materialsPageResponse->assertSee('care-plan.pptx', false);
    $materialsPageResponse->assertDontSee('Week 1 Slides', false);
});

it('returns not found for inactive course detail', function () {
    $course = CourseDetail::create([
        'couse_name' => 'Hidden',
        'active_status' => 0,
    ]);

    $this->get(route('cne.modules.show', $course))->assertNotFound();
});

it('shows buy now as login trigger for guests even without a purchase url', function () {
    $course = CourseDetail::create([
        'couse_name' => 'Purchasable',
        'description' => 'Test',
        'active_status' => 1,
    ]);

    $response = $this->get(route('cne.modules.show', $course));

    $response->assertSuccessful();
    $response->assertSee('Buy now', false);
    $response->assertSee('open-login-modal', false);
});

it('shows buy now as disabled for authenticated users when course has no purchase url', function () {
    $user = User::factory()->create(['role_type' => 'admin']);

    $course = CourseDetail::create([
        'couse_name' => 'No URL',
        'description' => 'Test',
        'active_status' => 1,
    ]);

    $response = $this->withoutMiddleware(\App\Http\Middleware\LogoutNonUsers::class)
        ->actingAs($user)
        ->get(route('cne.modules.show', $course));

    $response->assertSuccessful();
    $response->assertSee('Buy now', false);
    $response->assertSee('disabled', false);
});

it('shows buy now as external link for authenticated users when course has a purchase url', function () {
    $user = User::factory()->create(['role_type' => 'admin']);

    $course = CourseDetail::create([
        'couse_name' => 'Purchasable',
        'description' => 'Test',
        'course_url' => 'https://example.com/purchase',
        'active_status' => 1,
    ]);

    $response = $this->withoutMiddleware(\App\Http\Middleware\LogoutNonUsers::class)
        ->actingAs($user)
        ->get(route('cne.modules.show', $course));

    $response->assertSuccessful();
    $response->assertSee('https://example.com/purchase', false);
});

it('renders the compact two-column score card modal pattern', function () {
    $course = CourseDetail::create([
        'couse_name' => 'Score Card Module',
        'description' => 'Test',
        'active_status' => 1,
    ]);

    $response = $this->get(route('cne.modules.show', $course));

    $response->assertSuccessful();
    $response->assertSee('Score Card', false);
    $response->assertSee('Correct Answer', false);
    $response->assertSee('Incorrect Answer', false);
    $response->assertSee('grid-cols-2', false);
    $response->assertSee('max-w-md', false);
});

it('deactivates learning resources and practice test when final test is started or attempted', function () {
    $user = User::factory()->create(['role_type' => 'user']);
    $course = CourseDetail::create([
        'couse_name' => 'Final Started Course',
        'description' => 'Course description',
        'practice_content' => 'Practice content available',
        'active_status' => 1,
    ]);

    $order = \App\Models\Order::create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'payment_mode' => \App\Enums\PaymentMode::InternetBanking->value,
        'payment_status' => \App\Enums\PaymentStatus::Completed->value,
        'start_date' => now()->subDays(2)->toDateString(),
        'end_date' => now()->addDays(10)->toDateString(),
    ]);
    \App\Models\Order::query()->where('id', $order->id)->update(['created_at' => now()->subHours(10)->toDateTimeString()]);

    // Create completed pretest after order created_at
    \App\Models\CourseTestAttempt::create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'test_type' => \App\Enums\CourseTestType::Pre->value,
        'status' => \App\Models\CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1, 2],
        'total_questions' => 2,
        'correct_count' => 2,
        'started_at' => now()->subMinutes(30),
        'completed_at' => now()->subMinutes(20),
        'score_percent' => 80.0,
    ]);

    // Create final test attempt after order created_at
    \App\Models\CourseTestAttempt::create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'test_type' => \App\Enums\CourseTestType::Final->value,
        'status' => \App\Models\CourseTestAttempt::STATUS_COMPLETED,
        'question_ids' => [1, 2],
        'total_questions' => 2,
        'correct_count' => 1,
        'started_at' => now()->subMinutes(10),
        'completed_at' => now()->subMinutes(5),
        'score_percent' => 75.0,
    ]);

    $response = $this->actingAs($user)->get(route('cne.modules.show', $course));
    $response->assertSuccessful();
    $response->assertSee('Learning Resources (Locked)', false);
    $response->assertSee('Learning Resources are deactivated', false);
    $response->assertSee('Practice Test (Locked)', false);
    $response->assertSee('Practice Test is deactivated', false);

    // Direct route access should be blocked
    $materialsResponse = $this->actingAs($user)->get(route('cne.modules.materials', $course));
    $materialsResponse->assertStatus(403);

    session()->put('finaltest_otp_verified_' . $course->id, true);
    $practiceResponse = $this->actingAs($user)->get(route('cne.modules.test', [$course->couse_name, 'practice']));
    $practiceResponse->assertStatus(403);
});
