<?php

use \Illuminate\Support\Carbon;

use Symfony\Component\HttpFoundation\Response;
use function Pest\Laravel\{getJson, postJson};

it('api is unstable', function () {
    getJson('/api/circuit-breaker/unstable-service')
        ->assertOk();

    Carbon::setTestNow(Carbon::now()->setSeconds(5));

    getJson('/api/circuit-breaker/unstable-service')
        ->assertStatus(Response::HTTP_TOO_MANY_REQUESTS);
});

it('circuit breaker can handle too many request', function () {
    getJson('/api/circuit-breaker/unstable-service')
        ->assertOk();

    Carbon::setTestNow(Carbon::now()->setSeconds(5));

    postJson('/api/circuit-breaker/handling')
        ->assertOk();

    Carbon::setTestNow(Carbon::now()->setSeconds(5));

    postJson('/api/circuit-breaker/handling')
        ->assertOk();
});
