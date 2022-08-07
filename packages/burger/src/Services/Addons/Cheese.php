<?php

namespace Kevariable\Burger\Services\Addons;

use Kevariable\Burger\Foundation\Decorator;

class Cheese extends Decorator
{
    public function resolveForCost(): int
    {
        return 10 + parent::resolveForCost();
    }
}
