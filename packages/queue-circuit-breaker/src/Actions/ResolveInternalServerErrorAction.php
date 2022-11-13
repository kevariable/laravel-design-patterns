<?php

namespace Kevariable\QueueCircuitBreaker\Actions;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Kevariable\QueueCircuitBreaker\Contracts\Command;
use Kevariable\QueueCircuitBreaker\Enums\CircuitBreaker\Interval;
use Kevariable\QueueCircuitBreaker\Enums\CircuitBreaker\Key;

class ResolveInternalServerErrorAction implements Command
{
    public function execute($job, Response $response): void
    {
        if (Cache::get(Key::failures->value)) {
            Cache::increment(key: Key::failures->value);
        } else {
            Cache::remember(
                key: Key::failures->value,
                ttl: now()->addMinutes(Interval::timeout->value),
                callback: fn () => Interval::startCounting->value
            );
        }

        dd(Cache::get(Key::failures->value));
    }
}
