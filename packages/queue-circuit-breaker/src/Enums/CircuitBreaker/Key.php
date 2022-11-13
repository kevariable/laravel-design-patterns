<?php

namespace Kevariable\QueueCircuitBreaker\Enums\CircuitBreaker;

enum Key: string
{
    case open = 'circuit-breaker:open';

    case failures = 'circuit-breaker:failures';
}
