<?php

namespace App\Foundation;

use App\Contracts\Food;

abstract class Decorator
{
    public function __construct(public Food $food)
    {
        # code...
    }

    public function food(): Food
    {
        return $this->food;
    }
}