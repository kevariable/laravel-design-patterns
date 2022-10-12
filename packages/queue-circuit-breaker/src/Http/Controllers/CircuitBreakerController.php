<?php

namespace Kevariable\QueueCircuitBreaker\Http\Controllers;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Routing\Controller;
use Kevariable\QueueCircuitBreaker\Jobs\UnstableService;
use Kevariable\QueueCircuitBreaker\Http\Responses\CircuitBreakerResponse;

class CircuitBreakerController extends Controller
{
    public function __invoke(): Responsable
    {
        UnstableService::dispatch();

        return new CircuitBreakerResponse;
    }
}
