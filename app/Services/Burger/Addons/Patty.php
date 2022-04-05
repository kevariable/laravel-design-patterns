<?php

namespace App\Services\Burger\Addons;

use App\Contracts\Food;
use App\Foundation\Decorator;

class Patty extends Decorator implements Food
{
    public function resolveForCost(): int
    {
        return 5 + $this->food()->resolveForCost();
    }
}