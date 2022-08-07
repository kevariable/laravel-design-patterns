<?php

namespace App\Services\Burger;

use App\Contracts\Food;

class Burger implements Food
{
    public function resolveForCost(): int
    {
        return 5;
    }
}