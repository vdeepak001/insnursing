<?php

it('returns a successful response for the CPD certifications page', function () {
    $response = $this->get(route('cpd.certifications'));

    $response->assertSuccessful();
    $response->assertSee('CNE Certification', false);
    $response->assertSee('Certify Your Skills.', false);
    $response->assertSee('Purpose of CNE Certification', false);
    $response->assertSee('Importance of CNE Certification', false);
    $response->assertSee('Certification Journey', false);
    $response->assertSee('Download CNE Certificate', false);
    $response->assertSee('Process of CNE Certification', false);
});
