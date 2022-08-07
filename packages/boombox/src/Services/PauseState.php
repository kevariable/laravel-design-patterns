<?php

namespace Kevariable\Boombox\Services;

use Kevariable\Boombox\Foundation\State;

class PauseState extends State
{
    public function pause(): void
    {
        $this->boombox->resolveStateForChanged($this);
    }

    public function stop(): void
    {
        $this->boombox->resolveStateForChanged(new StopState($this->boombox));
    }

    public function play(): void
    {
        $this->boombox->resolveStateForChanged(new PlayState($this->boombox));
    }
}
