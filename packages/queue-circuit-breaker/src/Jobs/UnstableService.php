<?php

namespace Kevariable\QueueCircuitBreaker\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Kevariable\QueueCircuitBreaker\Client;
use Kevariable\QueueCircuitBreaker\Jobs\Middleware\CircuitBreaker;

class UnstableService implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue;

    public function __invoke()
    {
        resolve(Client::class)->execute();
    }

    public function middleware(): array
    {
        return [
            new CircuitBreaker
        ];
    }
}
