<?php

it('returns a successful response for the practice test page', function () {
    $response = $this->get(route('practice.test'));

    $response->assertSuccessful();
    $response->assertSee('Practice Tests', false);
    $response->assertSee('Practice Today', false);
    $response->assertSee('Excel Tomorrow', false);
    $response->assertSee('Features of Online CNE Practice Tests', false);
    $response->assertSee('Benefits of Practice Tests', false);
    $response->assertSee('Why Practice Tests Matter', false);
    $response->assertSee('How Practice Tests Work', false);
    $response->assertSee('Practice_test_banner.png', false);
});
