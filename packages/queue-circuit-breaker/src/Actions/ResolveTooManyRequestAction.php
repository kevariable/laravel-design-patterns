<?php

namespace Kevariable\QueueCircuitBreaker\Actions;

use Illuminate\Http\Client\Response;
use Kevariable\QueueCircuitBreaker\CircuitBreaker;
use Kevariable\QueueCircuitBreaker\Contracts\Command;

class ResolveTooManyRequestAction implements Command
{
    public function execute(CircuitBreaker $circuitBreaker, Response $response): void
    {
        $retryAfter = $response->header('Retry-After');

        $circuitBreaker->release(is_integer($retryAfter) ? $retryAfter : null);
    }
}
