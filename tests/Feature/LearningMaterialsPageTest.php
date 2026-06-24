<?php

it('returns a successful response for the learning materials page', function () {
    $response = $this->get(route('learning.materials'));

    $response->assertSuccessful();
    $response->assertSee('Learning Resources', false);
    $response->assertSee('Learn. Grow. Excel.', false);
    $response->assertSee('Browse Resources by Category', false);
    $response->assertSee('Features of Learning Resources', false);
    $response->assertSee('Importance of Learning Resources in Online CNE', false);
    $response->assertSee('PowerPoint Slide Materials', false);
    $response->assertSee('PDF Learning Resources', false);
    $response->assertSee('images/design/WhatsApp Image 2026-06-11 at 17.26.40.jpeg', false);
});
