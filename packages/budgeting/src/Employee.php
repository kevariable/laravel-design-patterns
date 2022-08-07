<?php

namespace Kevariable\Budgeting;

class Employee implements Contracts\Leaf
{
    public function __construct(public string $name, public int $amount)
    {
    }

    public function calculateBudget(): int
    {
        return $this->amount;
    }
}
