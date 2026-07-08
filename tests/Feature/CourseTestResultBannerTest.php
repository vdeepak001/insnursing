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
        ->assertSee('You have successfully completed the final test')
        ->assertDontSee('Test Completed')
        ->assertDontSee('Congratulations, Jane')
        ->assertSee('fill="#FFD700"', false) // Trophy is visible
        ->assertDontSee('text-rose-500'); // Warning icon is not visible
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
        ->assertSee('You have not successfully completed the final test')
        ->assertSee('Try Again')
        ->assertSee('Back to Module')
        ->assertDontSee('Better Luck Next Time')
        ->assertDontSee('Retake Test')
        ->assertDontSee('fill="#FFD700"') // Trophy is not visible
        ->assertSee('text-rose-500'); // Warning icon is visible
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
        ->assertSee('Sorry, Sam!')
        ->assertSee('You have not successfully completed the Exam.')
        ->assertSee('Purchase Module')
        ->assertSee('Back to module')
        ->assertDontSee('fill="#FFD700"') // Trophy is not visible
        ->assertSee('text-rose-500'); // Warning icon is visible
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
        ->assertSee('Test Completed')
        ->assertSee('You have completed the Pre-Test')
        ->assertSee('Banner Test Module')
        ->assertSee('Start Learning')
        ->assertSee(route('cne.modules.materials', $course->couse_name), false)
        ->assertDontSee('Rate Your Performance')
        ->assertDontSee('Feedback')
        ->assertDontSee('Download Certificate')
        ->assertDontSee('width: 110px; height: 110px; min-width: 110px;', false) // Trophy box is hidden
        ->assertDontSee('fill="#FFD700"') // Trophy is not visible
        ->assertDontSee('text-rose-500'); // Warning icon is not visible
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
        ->assertSee('Test Completed')
        ->assertSee('You have completed the Mock Test')
        ->assertSee('Start Learning')
        ->assertDontSee('Feedback')
        ->assertDontSee('Download Certificate')
        ->assertDontSee('width: 110px; height: 110px; min-width: 110px;', false) // Trophy box is hidden
        ->assertDontSee('fill="#FFD700"') // Trophy is not visible
        ->assertDontSee('text-rose-500'); // Warning icon is not visible
});

it('shows feedback heading for final test results', function () {
    $user = User::factory()->create(['name' => 'Jane Doe']);
    $course = CourseDetail::create([
        'couse_name' => 'Banner Test Module',
        'active_status' => 1,
    ]);

    Livewire::actingAs($user)
        ->test(CourseTestResultPreview::class, ['courseId' => $course->id])
        ->assertSee('Feedback')
        ->assertSee('Give a 5-star rating')
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
