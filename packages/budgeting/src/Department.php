<?php

namespace Kevariable\Budgeting;

use Illuminate\Support\Collection;
use Kevariable\Budgeting\Contracts\Leaf;

class Department implements \Kevariable\Budgeting\Contracts\Container
{
    protected Collection $budgets;

    public function __construct()
    {
        $this->budgets = collect();
    }

    public function calculateBudget(): int
    {
        return $this->all()
            ->map(fn (Leaf $budget) => $budget->calculateBudget())
            ->sum();
    }

    public function add(Leaf $budget): static
    {
        $this->budgets->add($budget);

        return $this;
    }

    public function all(): Collection
    {
        return $this->budgets;
    }
}
