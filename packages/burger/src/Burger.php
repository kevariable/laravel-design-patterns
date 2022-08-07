<?php

namespace Kevariable\Burger;

use Kevariable\Burger\Contracts\Food;

class Burger implements Food
{
    public function resolveForCost(): int
    {
        return 5;
    }
}
