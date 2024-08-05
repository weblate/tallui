<?php

use Illuminate\Support\Facades\Artisan;

beforeEach(function () {
    // Optionally, you can refresh the application routes
    Artisan::call('route:cache');
});

test('healthy response', function () {

    $response = $this->get('/');

    $response->assertStatus(200);
});

it('redirects to login', function () {
    $response = $this->get('/moox');

    $response->assertRedirect('moox/login');
});

it('contains Sign in', function () {
    $response = $this->get('/moox/login');

    $response->assertSee('Sign in');
});
