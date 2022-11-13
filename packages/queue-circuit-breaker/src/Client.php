<?php

namespace Kevariable\QueueCircuitBreaker;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Kevariable\QueueCircuitBreaker\Contracts\Request;

class Client implements Request
{
    public function execute(): Response
    {
        return Http::acceptJson()
            ->timeout(5)
            ->get(url('/api/circuit-breaker/unstable-service'))
            ->throw();
    }
}
