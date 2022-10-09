<?php

namespace Kevariable\QueueCircuitBreaker\Http\Controllers;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Routing\Controller;
use Kevariable\QueueCircuitBreaker\CircuitBreaker;
use Kevariable\QueueCircuitBreaker\Http\Responses\CircuitBreakerResponse;

class CircuitBreakerController extends Controller
{
    public function __invoke(): Responsable
    {
        CircuitBreaker::dispatch();

        return new CircuitBreakerResponse;
    }
}
