<?php

namespace Kevariable\Boombox;

use Illuminate\Contracts\Container\Container;
use Kevariable\Boombox\Contracts\State;
use Kevariable\Boombox\Services\PauseState;
use Kevariable\Boombox\Services\PlayState;
use Kevariable\Boombox\Services\StopState;

class Boombox
{
    public function __construct(public Container $container)
    {
        //
    }

    public function resolveStateForChanged(State $state): static
    {
        $this->container->instance(State::class, $state);

        return $this;
    }

    public function getState(): State
    {
        return $this->container->make(State::class);
    }

    public function pause(): void
    {
        $this->container->make(PauseState::class)->pause();
    }

    public function stop(): void
    {
        $this->container->make(StopState::class)->stop();
    }

    public function play(): void
    {
        $this->container->make(PlayState::class)->play();
    }
}
