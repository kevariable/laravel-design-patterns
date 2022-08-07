<?php

namespace Kevariable\Burger\Services\Addons;

use Kevariable\Burger\Foundation\Decorator;

class Patty extends Decorator
{
    public function resolveForCost(): int
    {
        return 5 + parent::resolveForCost();
    }
}
