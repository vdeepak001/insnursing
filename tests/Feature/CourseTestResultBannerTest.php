<?php

use App\Enums\CourseTestType;
use App\Models\CourseDetail;
use App\Models\User;
use Livewire\Livewire;
use Tests\Support\CourseTestResultPreview;

it('shows final test success banner without test completed label', function () {
    $user = User::factory()->create(['name' => 'Jane Doe']);
    $course = CourseDetail::create([
        'couse_name' => 'Banner Test Module',
        'active_status' => 1,
    ]);

    Livewire::actingAs($user)
        ->test(CourseTestResultPreview::class, ['courseId' => $course->id])
        ->assertSee('Congratulations!')
        ->assertSee('Jane')
        ->assertSee('You have completed the Final test')
        ->assertDontSee('Test Completed')
        ->assertDontSee('Congratulations, Jane');
});

it('shows final test first-attempt failure banner and actions', function () {
    $user = User::factory()->create(['name' => 'John Smith']);
    $course = CourseDetail::create([
        'couse_name' => 'Banner Test Module',
        'active_status' => 1,
    ]);

    Livewire::actingAs($user)
        ->test(CourseTestResultPreview::class, ['courseId' => $course->id])
        ->set('passed', false)
        ->set('finalAttemptCount', 1)
        ->assertSee('Sorry!')
        ->assertSee('John')
        ->assertSee('You have not successfully completed the Exam')
        ->assertSee('You can make one more CNE attempt')
        ->assertSee('Try Again')
        ->assertSee('Back to module')
        ->assertDontSee('Better Luck Next Time')
        ->assertDontSee('Retake Test');
});

it('shows final test second-attempt failure banner and purchase actions', function () {
    $user = User::factory()->create(['name' => 'Sam Taylor']);
    $course = CourseDetail::create([
        'couse_name' => 'Banner Test Module',
        'active_status' => 1,
    ]);

    Livewire::actingAs($user)
        ->test(CourseTestResultPreview::class, ['courseId' => $course->id])
        ->set('passed', false)
        ->set('finalAttemptCount', 2)
        ->assertSee('Sorry!')
        ->assertSee('Sam')
        ->assertSee('You have not successfully completed the Exam')
        ->assertSee('Purchase Module')
        ->assertSee('Back to module')
        ->assertDontSee('You can make one more CNE attempt');
});

it('shows pretest thank you banner with start learning link', function () {
    $user = User::factory()->create(['name' => 'Alex Lee']);
    $course = CourseDetail::create([
        'couse_name' => 'Banner Test Module',
        'active_status' => 1,
    ]);

    Livewire::actingAs($user)
        ->test(CourseTestResultPreview::class, ['courseId' => $course->id])
        ->set('type', CourseTestType::Pre)
        ->set('testType', 'pre')
        ->assertSee('Thank you!')
        ->assertSee('You have completed the Pre-Test')
        ->assertSee('Banner Test Module')
        ->assertSee('Start learning')
        ->assertSee(route('cne.modules.materials', $course->couse_name), false)
        ->assertDontSee('Test Completed')
        ->assertDontSee('Rate Your Performance')
        ->assertDontSee('Feedback (Give a star rating)')
        ->assertDontSee('Download Certificate');
});

it('shows mock test thank you banner without rating or certificate', function () {
    $user = User::factory()->create(['name' => 'Riya Patel']);
    $course = CourseDetail::create([
        'couse_name' => 'Banner Test Module',
        'active_status' => 1,
    ]);

    Livewire::actingAs($user)
        ->test(CourseTestResultPreview::class, ['courseId' => $course->id])
        ->set('type', CourseTestType::Mock)
        ->set('testType', 'mock')
        ->assertSee('Thank you!')
        ->assertSee('You have completed the Mock Test')
        ->assertSee('Start learning')
        ->assertDontSee('Feedback (Give a star rating)')
        ->assertDontSee('Download Certificate');
});

it('shows feedback heading for final test results', function () {
    $user = User::factory()->create(['name' => 'Jane Doe']);
    $course = CourseDetail::create([
        'couse_name' => 'Banner Test Module',
        'active_status' => 1,
    ]);

    Livewire::actingAs($user)
        ->test(CourseTestResultPreview::class, ['courseId' => $course->id])
        ->assertSee('Feedback (Give a star rating)')
        ->assertDontSee('Rate Your Performance');
});

it('shows the result hero image on the banner', function () {
    $user = User::factory()->create(['name' => 'Jane Doe']);
    $course = CourseDetail::create([
        'couse_name' => 'Banner Test Module',
        'active_status' => 1,
    ]);

    Livewire::actingAs($user)
        ->test(CourseTestResultPreview::class, ['courseId' => $course->id])
        ->assertSee(asset('images/design/test-result-hero.png'), false);
});
