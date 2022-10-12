<?php

namespace Kevariable\QueueCircuitBreaker\Actions;

use Illuminate\Http\Client\Response;
use Kevariable\QueueCircuitBreaker\Contracts\Command;

class ResolveTooManyRequestAction implements Command
{
    public function execute($job, Response $response): void
    {
        $retryAfter = $response->header('Retry-After');

        $job->release(is_integer($retryAfter) ? $retryAfter : null);
    }
}
