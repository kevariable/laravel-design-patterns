<?php

namespace Kevariable\QueueCircuitBreaker\Contracts;

use Illuminate\Http\Client\Response;
use Kevariable\QueueCircuitBreaker\CircuitBreaker;

interface Command
{
    public function execute(CircuitBreaker $circuitBreaker, Response $response): void;
}
