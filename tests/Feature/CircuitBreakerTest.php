<?php

use \Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Cache;
use Kevariable\QueueCircuitBreaker\Enums\CircuitBreaker\Key;
use function Pest\Laravel\{getJson, postJson};

beforeEach(function () {
    Cache::forget('unstable-services');
    Cache::forget('server-error');
    Cache::forget(Key::open->value);
    Cache::forget(Key::failures->value);
});

//it('api is unstable', function () {
//    getJson('/api/circuit-breaker/unstable-service')
//        ->assertOk();
//
//    Carbon::setTestNow(Carbon::now()->setSeconds(5));
//
//    getJson('/api/circuit-breaker/unstable-service')
//        ->assertStatus(Response::HTTP_TOO_MANY_REQUESTS);
//});
//
//it('circuit breaker can handle too many request', function () {
//    postJson('/api/circuit-breaker/handling')
//        ->assertOk();
//
//    Carbon::setTestNow(Carbon::now()->setSeconds(5));
//
//    postJson('/api/circuit-breaker/handling')
//        ->assertOk();
//});

it('circuit breaker can handle internal server error', function () {
    getJson('/api/circuit-breaker/unstable-service?server_error')
        ->assertOk();

    postJson('/api/circuit-breaker/handling')
        ->assertOk();
});
