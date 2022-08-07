<?php

namespace Kevariable\Burger\Foundation;

use Kevariable\Burger\Contracts\Food;

abstract class Decorator implements Food
{
    public function __construct(public Food $food)
    {
        // code...
    }

    public function resolveForCost(): int
    {
        return $this->food->resolveForCost();
    }
}
