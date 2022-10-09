<?php

namespace Kevariable\QueueCircuitBreaker;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class UnstableService implements ShouldQueue
{
    use Queueable;

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }
}
