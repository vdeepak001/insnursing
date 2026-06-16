<?php

it('returns a successful response for the CPD certifications page', function () {
    $response = $this->get(route('cpd.certifications'));

    $response->assertSuccessful();
    $response->assertSee('CNE Certification', false);
    $response->assertSee('Certify Your Skills.', false);
    $response->assertSee('Purpose of CNE Certification', false);
    $response->assertSee('Importance of CNE Certification', false);
    $response->assertSee('Certification Journey', false);
    $response->assertSee('Download CNE certificate', false);
    $response->assertSee('d="M8.25 4.5l7.5 7.5-7.5 7.5"', false);
    $response->assertSee('M 84 45', false);
    $response->assertSee('H 14', false);
    $response->assertSee('Start Your Certification Journey Today', false);
});
