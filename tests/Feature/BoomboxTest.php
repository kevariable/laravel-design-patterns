<?php

namespace Tests\Feature;

use Kevariable\Boombox\Boombox;
use Kevariable\Boombox\Exceptions\PauseException;
use Kevariable\Boombox\Services\PauseState;
use Kevariable\Boombox\Services\PlayState;
use Kevariable\Boombox\Services\StopState;
use Tests\TestCase;

class BoomboxTest extends TestCase
{
    public function test_state_to_be_play()
    {
        $state = $this->app->make(Boombox::class);

        $state->play();

        $this->assertInstanceOf(PlayState::class, $state->getState());
    }

    public function test_state_to_be_pause()
    {
        $state = $this->app->make(Boombox::class);

        $state->pause();

        $this->assertInstanceOf(PauseState::class, $state->getState());
    }

    public function test_state_to_be_stop()
    {
        $state = $this->app->make(Boombox::class);

        $state->stop();

        $this->assertInstanceOf(StopState::class, $state->getState());
    }

    public function test_stop_to_pause_state_will_throw_exception()
    {
        $state = $this->app->make(Boombox::class);

        $state->stop();

        $this->expectException(PauseException::class);

        $state->getState()->pause();
    }
}
