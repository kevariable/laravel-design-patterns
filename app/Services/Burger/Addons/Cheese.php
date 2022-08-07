<?php

namespace App\Services\Burger\Addons;

use App\Contracts\Food;
use App\Foundation\Food\Decorator;

class Cheese extends Decorator implements Food
{
    public function resolveForCost(): int
    {
        return 3 + $this->food()->resolveForCost();
    }
}