<?php

it('loads the homepage', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});
