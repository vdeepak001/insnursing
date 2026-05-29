<?php

use App\Models\CourseDetail;
use App\Models\Order;
use App\Models\User;

it('lists orders and displays parsed order status ID on order status page', function () {
    $staff = User::factory()->create(['role_type' => 'superadmin']);

    $learner = User::factory()->create([
        'role_type' => 'user',
        'name' => 'John Doe',
    ]);

    $course = CourseDetail::query()->create([
        'couse_name' => 'Demo Course',
        'description' => 'Test',
        'active_status' => 1,
    ]);

    // Create a ccavenue pending order (with raw IHS transaction ID in remarks)
    $pendingOrder = Order::query()->create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'state_council_id' => null,
        'payment_mode' => 'ccavenue',
        'start_date' => now()->toDateString(),
        'end_date' => now()->addDays(30)->toDateString(),
        'remarks' => 'IHS42T1234567890',
        'payment_status' => 'pending',
    ]);

    // Create a ccavenue completed order (with tracking ID in remarks)
    $completedOrder = Order::query()->create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'state_council_id' => null,
        'payment_mode' => 'ccavenue',
        'start_date' => now()->toDateString(),
        'end_date' => now()->addDays(30)->toDateString(),
        'remarks' => 'CCAvenue Tracking ID: 114537784967',
        'payment_status' => 'completed',
    ]);

    // Create a non-ccavenue order
    $manualOrder = Order::query()->create([
        'user_id' => $learner->id,
        'course_detail_id' => $course->id,
        'state_council_id' => null,
        'payment_mode' => 'internet_banking',
        'start_date' => now()->toDateString(),
        'end_date' => now()->addDays(30)->toDateString(),
        'remarks' => 'Bank transfer',
        'payment_status' => 'completed',
    ]);

    $response = $this->actingAs($staff)->get(route('super-admin.order-status.index'));

    $response->assertSuccessful();
    $response->assertSee('John Doe');
    $response->assertSee('IHS42T1234567890');
    $response->assertSee('114537784967');
    $response->assertDontSee('<td>' . $manualOrder->id . '</td>', false);
});
