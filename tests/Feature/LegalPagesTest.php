<?php

it('returns a successful response for the FAQ page', function () {
    $response = $this->get(route('faq'));

    $response->assertSuccessful();
    $response->assertSee('Frequently asked questions', false);
    $response->assertSee('Still have questions?', false);
});

it('returns a successful response for the privacy policy page', function () {
    $response = $this->get(route('privacy.policy'));

    $response->assertSuccessful();
    $response->assertSee('Privacy Policy', false);
    $response->assertSee('Your privacy matters', false);
});

it('returns a successful response for the terms and conditions page', function () {
    $response = $this->get(route('terms.conditions'));

    $response->assertSuccessful();
    $response->assertSee('Terms &amp; Conditions', false);
    $response->assertSee('Please read carefully', false);
});

it('returns a successful response for the cancellation policy page', function () {
    $response = $this->get(route('cancellation.policy'));

    $response->assertSuccessful();
    $response->assertSee('Cancellation &amp; Refund Policy', false);
    $response->assertSee('Impetus Healthcare Skills Private Limited', false);
});
