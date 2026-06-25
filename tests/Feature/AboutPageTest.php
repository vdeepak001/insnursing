<?php

it('returns a successful response for the about page with expected content', function () {
    $response = $this->get(route('about'));

    $response->assertSuccessful();
    $response->assertSee('About Impetus Healthcare Skills (IHS)', false);
    $response->assertSee('Our Focus', false);
    $response->assertSee('Simulation Based Training', false);
    $response->assertSee('Developing Skills for Safe and Effective Patient Care', false);
    $response->assertSee('Smart College Management System', false);
    $response->assertSee('https://www.nursingcms.com', false);
    $response->assertSee('Nursing Online Test', false);
    $response->assertSee('Professional Knowledge Assessment for Nurses', false);
    $response->assertSee('Capacity Building', false);
    $response->assertSeeText('Research & Development');
    $response->assertSee('Transforming Evidence into Impact', false);
    $response->assertSee('about/CBT_Image.png', false);
    $response->assertSee('about/Home_page_1A.png', false);
    $response->assertSee('15K+', false);
    $response->assertSeeText('Our Core Vision & Goal');
    $response->assertSee('Our Commitment', false);
    $response->assertSee('Together, We Build a Healthier Tomorrow', false);
});
