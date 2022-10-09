<?php

use \Illuminate\Support\Carbon;

use Symfony\Component\HttpFoundation\Response;
use function Pest\Laravel\get;

it('api is unstable', function () {
    get('/api/circuit-breaker/unstable-service')
        ->assertStatus(Response::HTTP_OK);

    Carbon::setTestNow(Carbon::now()->setSeconds(6));

    get('/api/circuit-breaker/unstable-service')
        ->assertStatus(Response::HTTP_TOO_MANY_REQUESTS);
});

