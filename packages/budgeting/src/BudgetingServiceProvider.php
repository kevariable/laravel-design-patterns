<?php

namespace Kevariable\Budgeting;

use Carbon\Laravel\ServiceProvider;
use Kevariable\Budgeting\Contracts\Container;
use Kevariable\Budgeting\Contracts\Leaf;

class BudgetingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Leaf::class, Employee::class);

        $this->app->bind(Container::class, Department::class);
    }
}
