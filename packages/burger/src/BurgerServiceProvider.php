<?php

namespace Kevariable\Burger;

use Carbon\Laravel\ServiceProvider;
use Kevariable\Burger\Contracts\Food;

class BurgerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Food::class, Burger::class);
    }
}
