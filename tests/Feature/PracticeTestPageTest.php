<?php

it('returns a successful response for the practice test page', function () {
    $response = $this->get(route('practice.test'));

    $response->assertSuccessful();
    $response->assertSee('Practice Tests', false);
    $response->assertSee('Practice Today. Excel Tomorrow.', false);
    $response->assertSee('Features of Online CNE Practice Tests', false);
    $response->assertSee('Benefits of Practice Tests', false);
    $response->assertSee('Purpose of Practice Tests', false);
    $response->assertSee('Why Practice Tests Matter', false);
    $response->assertSee('How Practice Tests Work', false);
    $response->assertSee('images/design/WhatsApp Image 2026-06-11 at 17.26.40.jpeg', false);
});
