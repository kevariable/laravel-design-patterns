<?php

namespace Kevariable\Boombox\States;

use Kevariable\Boombox\Exceptions\PauseException;
use Kevariable\Boombox\Foundation\State;

class StopState extends State
{
    public function stop(): void
    {
        $this->boombox->resolveStateForChanged($this);
    }

    public function pause(): void
    {
        throw new PauseException;
    }

    public function play(): void
    {
        $this->boombox->resolveStateForChanged(new PlayState($this->boombox));
    }
}
