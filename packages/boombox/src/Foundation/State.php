<?php

namespace Kevariable\Boombox\Foundation;

use Illuminate\Support\Facades\Log;
use Kevariable\Boombox\Boombox;

abstract class State implements \Kevariable\Boombox\Contracts\State
{
    public function __construct(public Boombox $boombox)
    {
    }

    public function play(): void
    {
        Log::info('Already Played');
    }

    public function pause(): void
    {
        Log::info('Already Paused');
    }

    public function stop(): void
    {
        Log::info('Already stopped');
    }
}
