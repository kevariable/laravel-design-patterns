<?php

namespace Tests\Feature;

use Kevariable\Burger\Burger;
use Kevariable\Burger\Contracts\Food;
use Kevariable\Burger\Services\Addons\Cheese;
use Kevariable\Burger\Services\Addons\Patty;
use Tests\TestCase;

class DecoratorTest extends TestCase
{
    public function test_take_charger_on_addons_for_burger()
    {
        $this->assertInstanceOf(Burger::class, $this->app->make(Food::class));

        $this->app->extend(Food::class, fn (Food $food) => new Patty($food));

        $this->assertInstanceOf(Patty::class, $this->app->make(Food::class));

        $this->assertEquals(10, $this->app->make(Food::class)->resolveForCost());

        $this->app->extend(Food::class, fn (Food $food) => new Cheese($food));

        $this->assertEquals(20, $this->app->make(Food::class)->resolveForCost());
    }
}
