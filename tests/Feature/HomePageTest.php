<?php

it('returns a successful response for the home page with design imagery and sections', function () {
    $response = $this->get(route('home'));

    $response->assertSuccessful();
    $response->assertSee('images/design/WhatsApp Image 2026-06-06 at 13.40.00.jpeg', false);
    $response->assertSee('images/design/WhatsApp Image 2026-06-11 at 17.14.41.jpeg', false);
    $response->assertSee('CNE Modules', false);
    $response->assertSee('Explore CNE Modules', false);
    $response->assertSee('Our Vision', false);
    $response->assertSee('Our Mission', false);
    $response->assertSee('Our Core Strengths', false);
    $response->assertSee('Continuing Nursing Education', false);
    $response->assertDontSee('Scalable &amp; Accessible Model', false);
    $response->assertSee('Our Values', false);
    $response->assertSee('Simulation-Based Training', false);
    $response->assertSee('Commitment to Quality Healthcare Education', false);
    $response->assertSee('aria-label="Facebook"', false);
    $response->assertSee('aria-label="LinkedIn"', false);
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
        ->toContain('.exam-sidebar-card')
        ->toContain('.exam-sidebar-intro')
        ->toContain('.exam-sidebar-grid')
        ->toContain('.exam-bottom-legend')
        ->toContain('.exam-legend-row')
        ->toContain('.exam-legend-dot')
        ->toContain('background-color: #0F766E');
});
