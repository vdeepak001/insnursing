<?php

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertSuccessful();
    $response->assertSee('Empowering Nurses. Impacting Care.', false);
    $response->assertSee('Impetus Healthcare Skills', false);
});

it('shows login CTA and hides dashboard link for guests', function () {
    $response = $this->get('/');

    $response->assertSee('Log in', false);
    $response->assertDontSee('Dashboard', false);
});
