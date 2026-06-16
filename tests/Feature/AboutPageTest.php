<?php

it('returns a successful response for the about page with expected content', function () {
    $response = $this->get(route('about'));

    $response->assertSuccessful();
    $response->assertSee('About Impetus Healthcare Skills (IHS)', false);
    $response->assertSee('Our Focus Areas', false);
    $response->assertSee('Public Health Training', false);
    $response->assertSeeText('Research & Development');
    $response->assertSee('Our Commitment', false);
    $response->assertSee('Simulation-Based Training', false);
    $response->assertSee('Together, We Build a Healthier Tomorrow', false);
});
