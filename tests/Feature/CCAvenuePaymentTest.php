<?php

use App\Enums\PaymentStatus;
use App\Models\CartItem;
use App\Models\CourseDetail;
use App\Models\Order;
use App\Models\State;
use App\Models\StateCouncil;
use App\Models\User;
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

    $ccavenue = app(CCAvenueService::class);
    parse_str($ccavenue->decrypt($response->viewData('encRequest'), config('services.ccavenue.working_key')), $payload);
    expect($payload['billing_state'])->toBe('Goa')
        ->and($payload['billing_city'])->toBe('Panaji')
        ->and($payload['billing_zip'])->toBe('403001');

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

    $txnId = 'IHS'.$user->id.'T'.time();

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

    $response->assertRedirect(route('cne.modules'));
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
    $txnId = 'IHS'.$user->id.'T'.time();

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

    $txnId = 'IHS'.$user->id.'T'.time();

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

    $callbackResponse->assertRedirect(route('cne.modules'));

    // Visit CNE modules index
    $indexResponse = $this->actingAs($user)->get(route('cne.modules'));
    $indexResponse->assertSuccessful();

    // Verify course is listed in the Purchased Modules section
    $indexResponse->assertSee('Purchased Modules');
    $indexResponse->assertSee('Purchased Module CNE Test');
});

it('builds ccavenue billing details for goa and other states', function (?string $state, ?string $city, ?string $zip, string $expectedState, string $expectedCity, string $expectedZip) {
    $user = User::factory()->create([
        'role_type' => 'user',
        'state' => $state,
        'city' => $city,
        'zip_code' => $zip,
    ]);

    $billing = app(CCAvenueService::class)->billingDetails($user);

    expect($billing['billing_state'])->toBe($expectedState)
        ->and($billing['billing_city'])->toBe($expectedCity)
        ->and($billing['billing_zip'])->toBe($expectedZip);
})->with([
    'goa without address' => ['Goa', null, null, 'Goa', 'Panaji', '403001'],
    'goa lowercase state' => ['goa', null, null, 'Goa', 'Panaji', '403001'],
    'goa city named Goa' => ['Goa', 'Goa', '400001', 'Goa', 'Panaji', '403001'],
    'goa short city' => ['Goa', 'Map', '403001', 'Goa', 'Panaji', '403001'],
    'goa with real address' => ['Goa', 'Margao', '403601', 'Goa', 'Margao', '403601'],
    'goa pin with a space' => ['Goa', 'Vasco', '403 802', 'Goa', 'Vasco', '403802'],
    'kerala without address' => ['Kerala', null, null, 'Kerala', 'Kerala', '400001'],
    'maharashtra without address' => ['Maharashtra', null, null, 'Maharashtra', 'Maharashtra', '400001'],
    'delhi with a saved address' => ['Delhi', 'New Delhi', '110001', 'Delhi', 'New Delhi', '110001'],
    'tamil nadu with a saved pin' => ['Tamil Nadu', 'Chennai', '600001', 'Tamil Nadu', 'Chennai', '600001'],
]);

it('sends the original ccavenue billing details for states other than goa', function (string $stateName, ?string $city, ?string $zip, string $expectedCity, string $expectedZip) {
    $state = State::query()->create([
        'name' => $stateName,
        'status' => 'active',
    ]);

    $course = CourseDetail::query()->create([
        'couse_name' => $stateName.' CNE',
        'description' => 'Test',
        'active_status' => 1,
    ]);

    $council = StateCouncil::query()->create([
        'state_id' => $state->id,
        'council_name' => $stateName.' Council',
        'active_status' => true,
    ]);
    $council->courseDetails()->attach($course->id, [
        'mrp' => 750,
        'offer_price' => 400,
        'valid_days' => 30,
    ]);

    $user = User::factory()->create([
        'role_type' => 'user',
        'state' => $stateName,
        'city' => $city,
        'zip_code' => $zip,
        'phone' => '9876543210',
        'country' => 'India',
    ]);

    CartItem::query()->create([
        'user_id' => $user->id,
        'course_detail_id' => $course->id,
        'state_council_id' => $council->id,
        'mrp' => 750,
        'offer_price' => 400,
        'valid_days' => 30,
    ]);

    $response = $this->actingAs($user)->post(route('cart.checkout'));

    $response->assertSuccessful();
    $response->assertViewIs('cart.checkout_redirect');

    parse_str(
        app(CCAvenueService::class)->decrypt($response->viewData('encRequest'), config('services.ccavenue.working_key')),
        $payload
    );

    expect($payload['billing_state'])->toBe($stateName)
        ->and($payload['billing_city'])->toBe($expectedCity)
        ->and($payload['billing_zip'])->toBe($expectedZip)
        ->and($payload['billing_country'])->toBe('India')
        ->and($payload['billing_tel'])->toBe('9876543210')
        ->and($payload['currency'])->toBe('INR')
        ->and($payload['amount'])->toBe('400.00');
})->with([
    'kerala without address' => ['Kerala', null, null, 'Kerala', '400001'],
    'maharashtra without address' => ['Maharashtra', null, null, 'Maharashtra', '400001'],
    'delhi with a saved address' => ['Delhi', 'New Delhi', '110001', 'New Delhi', '110001'],
]);

it('keeps a real gateway failure message for any state', function () {
    $course = CourseDetail::query()->create([
        'couse_name' => 'Kerala Failed Payment Course',
        'description' => 'Test',
        'active_status' => 1,
    ]);

    $user = User::factory()->create(['role_type' => 'user', 'state' => 'Kerala']);
    $txnId = 'IHS'.$user->id.'T'.time();

    Order::query()->create([
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
    $responseString = "order_id={$txnId}&order_status=Failure&tracking_id=555&failure_message=Declined+by+bank&status_message=Do+not+use+this";
    $encResp = $ccavenue->encrypt($responseString, config('services.ccavenue.working_key'));

    $response = $this->post(route('payment.ccavenue.callback'), [
        'encResp' => $encResp,
    ]);

    $response->assertRedirect(route('cart.index'));
    $response->assertSessionHas('error', 'Payment failed. Reason: Declined by bank');
});

it('shows the gateway status message when the failure message is empty', function () {
    $course = CourseDetail::query()->create([
        'couse_name' => 'Failed Payment Course',
        'description' => 'Test',
        'active_status' => 1,
    ]);

    $user = User::factory()->create(['role_type' => 'user', 'state' => 'Goa']);
    $txnId = 'IHS'.$user->id.'T'.time();

    Order::query()->create([
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
    $responseString = "order_id={$txnId}&order_status=Failure&tracking_id=123456789&failure_message=&status_message=Billing+state+and+pincode+do+not+match";
    $encResp = $ccavenue->encrypt($responseString, config('services.ccavenue.working_key'));

    $response = $this->post(route('payment.ccavenue.callback'), [
        'encResp' => $encResp,
    ]);

    $response->assertRedirect(route('cart.index'));
    $response->assertSessionHas('error', 'Payment failed. Reason: Billing state and pincode do not match');
});
