<?php

use App\Models\CartItem;
use App\Models\CourseDetail;
use App\Models\State;
use App\Models\StateCouncil;
use App\Models\User;
use App\Models\Order;
use App\Enums\PaymentStatus;
use App\Services\CCAvenueService;

it('requires authenticated user with user role to checkout', function () {
    $response = $this->post(route('cart.checkout'));
    $response->assertRedirect(route('login'));
});

it('fails to checkout if cart is empty', function () {
    $user = User::factory()->create(['role_type' => 'user']);
    $response = $this->actingAs($user)->post(route('cart.checkout'));
    $response->assertRedirect(route('cart.index'));
    $response->assertSessionHas('error', 'Your cart is empty.');
});

it('creates pending orders and redirects to ccavenue integration redirect page', function () {
    $state = State::query()->create([
        'name' => 'Goa',
        'status' => 'active',
    ]);

    $course = CourseDetail::query()->create([
        'couse_name' => 'Goa Special CNE',
        'description' => 'Test',
        'active_status' => 1,
    ]);

    $council = StateCouncil::query()->create([
        'state_id' => $state->id,
        'council_name' => 'Goa Council',
        'active_status' => true,
    ]);
    $council->courseDetails()->attach($course->id, [
        'mrp' => 1500,
        'offer_price' => 1200,
        'valid_days' => 60,
    ]);

    $user = User::factory()->create([
        'role_type' => 'user',
        'state' => 'Goa',
    ]);

    CartItem::query()->create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'state_council_id' => $council->id,
        'mrp' => 1500,
        'offer_price' => 1200,
        'valid_days' => 60,
    ]);

    $response = $this->actingAs($user)->post(route('cart.checkout'));

    $response->assertSuccessful();
    $response->assertViewIs('cart.checkout_redirect');
    $response->assertViewHasAll(['ccavenueUrl', 'encRequest', 'accessCode']);

    // Assert pending order was created
    $this->assertDatabaseHas('orders', [
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'payment_status' => PaymentStatus::Pending->value,
        'payment_mode' => 'ccavenue',
    ]);
});

it('processes successful ccavenue payment callback', function () {
    $state = State::query()->create([
        'name' => 'Kerala',
        'status' => 'active',
    ]);

    $course = CourseDetail::query()->create([
        'couse_name' => 'Kerala Special CNE',
        'description' => 'Test',
        'active_status' => 1,
    ]);

    $council = StateCouncil::query()->create([
        'state_id' => $state->id,
        'council_name' => 'Kerala Council',
        'active_status' => true,
    ]);
    $council->courseDetails()->attach($course->id);

    $user = User::factory()->create([
        'role_type' => 'user',
        'state' => 'Kerala',
    ]);

    CartItem::query()->create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'state_council_id' => $council->id,
        'mrp' => 2000,
        'offer_price' => 1800,
        'valid_days' => 90,
    ]);

    $txnId = 'IHS' . $user->id . 'T' . time();

    $order = Order::query()->create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'state_council_id' => $council->id,
        'payment_mode' => 'ccavenue',
        'start_date' => now(),
        'end_date' => now()->addDays(90),
        'remarks' => $txnId,
        'payment_status' => PaymentStatus::Pending,
    ]);

    $ccavenue = app(CCAvenueService::class);
    $responseString = "order_id={$txnId}&order_status=Success&tracking_id=123456789&failure_message=";
    $encResp = $ccavenue->encrypt($responseString, config('services.ccavenue.working_key'));

    $response = $this->post(route('payment.ccavenue.callback'), [
        'encResp' => $encResp,
    ]);

    $response->assertRedirect(route('profile'));
    $response->assertSessionHas('success');

    // Assert order completed
    $this->assertDatabaseHas('orders', [
        'id' => $order->id,
        'payment_status' => PaymentStatus::Completed->value,
        'remarks' => 'CCAvenue Tracking ID: 123456789',
    ]);

    // Assert cart cleared
    $this->assertDatabaseMissing('cart_items', [
        'user_id' => $user->id,
    ]);
});

it('processes aborted ccavenue payment callback', function () {
    $course = CourseDetail::query()->create([
        'couse_name' => 'Aborted Course Special',
        'description' => 'Test',
        'active_status' => 1,
    ]);

    $user = User::factory()->create(['role_type' => 'user']);
    $txnId = 'IHS' . $user->id . 'T' . time();

    $order = Order::query()->create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'state_council_id' => null,
        'payment_mode' => 'ccavenue',
        'start_date' => now(),
        'end_date' => now()->addDays(30),
        'remarks' => $txnId,
        'payment_status' => PaymentStatus::Pending,
    ]);

    $ccavenue = app(CCAvenueService::class);
    $responseString = "order_id={$txnId}&order_status=Aborted&tracking_id=123456789&failure_message=Cancelled+by+user";
    $encResp = $ccavenue->encrypt($responseString, config('services.ccavenue.working_key'));

    $response = $this->post(route('payment.ccavenue.callback'), [
        'encResp' => $encResp,
    ]);

    $response->assertRedirect(route('cart.index'));
    $response->assertSessionHas('error');

    // Assert order aborted
    $this->assertDatabaseHas('orders', [
        'id' => $order->id,
        'payment_status' => PaymentStatus::Aborted->value,
    ]);
});

it('enables the purchased course in the modules list after successful callback', function () {
    $state = State::query()->create([
        'name' => 'Goa',
        'status' => 'active',
    ]);

    $course = CourseDetail::query()->create([
        'couse_name' => 'Purchased Module CNE Test',
        'description' => 'Test',
        'active_status' => 1,
    ]);

    $council = StateCouncil::query()->create([
        'state_id' => $state->id,
        'council_name' => 'Goa Council',
        'active_status' => true,
    ]);
    $council->courseDetails()->attach($course->id, [
        'mrp' => 1500,
        'offer_price' => 1200,
        'valid_days' => 60,
        'points' => 10,
    ]);

    $user = User::factory()->create([
        'role_type' => 'user',
        'state' => 'Goa',
    ]);

    $txnId = 'IHS' . $user->id . 'T' . time();

    $order = Order::query()->create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'state_council_id' => $council->id,
        'payment_mode' => 'ccavenue',
        'start_date' => now(),
        'end_date' => now()->addDays(60),
        'remarks' => $txnId,
        'payment_status' => PaymentStatus::Pending,
    ]);

    // Simulate successful payment callback
    $ccavenue = app(CCAvenueService::class);
    $responseString = "order_id={$txnId}&order_status=Success&tracking_id=987654321&failure_message=";
    $encResp = $ccavenue->encrypt($responseString, config('services.ccavenue.working_key'));

    $callbackResponse = $this->post(route('payment.ccavenue.callback'), [
        'encResp' => $encResp,
    ]);

    $callbackResponse->assertRedirect(route('profile'));

    // Visit CNE modules index
    $indexResponse = $this->actingAs($user)->get(route('cne.modules'));
    $indexResponse->assertSuccessful();

    // Verify course is listed in the Purchased Modules section
    $indexResponse->assertSee('Purchased Modules');
    $indexResponse->assertSee('Purchased Module CNE Test');
});

