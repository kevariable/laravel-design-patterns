<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Kevariable\Budgeting\Contracts\Container;
use Kevariable\Budgeting\Contracts\Leaf;
use Tests\TestCase;

class BudgetingTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        tap($this->app->make(Container::class), function (Container $container) {
            $backend = $this->app->make(Container::class);

            $kevin = $this->app->make(Leaf::class, [
                'name' => $this->faker->name('male'),
                'amount' => 5,
            ]);

            $sarah = $this->app->make(Leaf::class, [
                'name' => $this->faker->name('female'),
                'amount' => 10,
            ]);

            $backend
                ->add($kevin)
                ->add($sarah);

            $frontend = $this->app->make(Container::class);

            $winnie = $this->app->make(Leaf::class, [
                'name' => $this->faker->name('male'),
                'amount' => 5,
            ]);

            $frontend
                ->add($winnie);

            $this->assertEquals(20, $container
                ->add($backend)
                ->add($frontend)
                ->calculateBudget());
        });
    }
}
