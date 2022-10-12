<?php

namespace Kevariable\QueueCircuitBreaker\Contracts;

use Illuminate\Http\Client\Response;

interface Command
{
    public function execute(mixed $job, Response $response): void;
}
