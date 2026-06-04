<?php

it('returns a successful response for the home page with static course card imagery', function () {
    $response = $this->get(route('home'));

    $response->assertSuccessful();
    $response->assertSee('images/Nursing.png', false);
    $response->assertSee('CNE', false);
});

it('uses the orange and teal brand palette in theme css', function () {
    $css = file_get_contents(resource_path('css/app.css'));

    expect($css)
        ->toContain('--color-impetus-orange: #FF7A00')
        ->toContain('--color-impetus-light-teal: #CCFBF1')
        ->toContain('--color-impetus-teal: #0F766E')
        ->toContain('--color-impetus-navy: #1E3A5F')
        ->toContain('--color-impetus-background: #F9FAFB')
        ->toContain('.exam-header')
        ->toContain('background-color: #0F766E');
});
