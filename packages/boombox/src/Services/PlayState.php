<?php

namespace Kevariable\Boombox\Services;

use Kevariable\Boombox\Foundation\State;

class PlayState extends State
{
    public function play(): void
    {
        $this->boombox->resolveStateForChanged($this);
    }

    public function pause(): void
    {
        $this->boombox->resolveStateForChanged(new PauseState($this->boombox));
    }

    public function stop(): void
    {
        $this->boombox->resolveStateForChanged(new StopState($this->boombox));
    }
}
