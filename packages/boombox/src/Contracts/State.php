<?php

namespace Kevariable\Boombox\Contracts;

interface State
{
    public function pause(): void;

    public function stop(): void;

    public function play(): void;
}
