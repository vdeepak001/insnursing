<?php

it('returns a successful response for the online examination page', function () {
    $response = $this->get(route('online.examination'));

    $response->assertSuccessful();
    $response->assertSee('Online CNE Tests', false);
    $response->assertSee('Purpose of Online CNE Tests', false);
    $response->assertSee('Benefits of Online CNE Tests', false);
    $response->assertSee('Automated Feedback', false);
});
