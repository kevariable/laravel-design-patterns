<?php

namespace Kevariable\QueueCircuitBreaker\Enums\CircuitBreaker;

enum Interval: int
{
    case startCounting = 1;

    case timeout = 10;
}
