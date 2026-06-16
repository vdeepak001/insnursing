<?php

it('returns a successful response for the online examination page', function () {
    $response = $this->get(route('online.examination'));

    $response->assertSuccessful();
    $response->assertSee('Smart Testing. Stronger Nursing Career.', false);
    $response->assertSee('Purpose of Online CNE Test', false);
    $response->assertSee('Benefits of Online CNE Test', false);
    $response->assertSee('Features of Online CNE Test', false);
    $response->assertSee('Automated Feedback', false);
    $response->assertSee('Questions Difficulty Hierarchy', false);
    $response->assertSee('Test Today, Improve Everyday, Lead Tomorrow', false);
    $response->assertSee('images/design/WhatsApp Image 2026-06-11 at 17.26.40.jpeg', false);
});
