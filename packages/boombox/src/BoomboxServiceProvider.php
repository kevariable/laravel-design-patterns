<?php

namespace Kevariable\Boombox;

use Illuminate\Support\ServiceProvider;
use Kevariable\Boombox\Contracts\State;
use Kevariable\Boombox\States\StopState;

class BoomboxServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(State::class, StopState::class);
    }
}
