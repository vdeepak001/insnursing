<?php

it('returns a successful response for the practice test page', function () {
    $response = $this->get(route('practice.test'));

    $response->assertSuccessful();
    $response->assertSee('Practice Tests', false);
    $response->assertSee('Features of Online CNE Practice Tests', false);
    $response->assertSee('Benefits of Practice Tests', false);
    $response->assertSee('Purpose of Practice Tests', false);
});
