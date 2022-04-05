<?php

namespace Tests\Feature;

use App\Contracts\Food;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class DecoratorTest extends TestCase
{
    public function test_take_charger_on_addons_for_burger()
    {
        $this->assertInstanceOf(\App\Services\Burger\Burger::class,
            $this->app->make(Food::class));

        $this->app->extend(Food::class,
            fn (Food $food) => new \App\Services\Burger\Addons\Patty($food));

        $this->assertInstanceOf(\App\Services\Burger\Addons\Patty::class,
            $this->app->make(Food::class));

        $this->assertEquals(10, $this->app->make(Food::class)->resolveForCost());

        $this->app->extend(Food::class,
            fn (Food $food) => new \App\Services\Burger\Addons\Cheese($food));

        $this->assertEquals(13, $this->app->make(Food::class)->resolveForCost());
    }
}
