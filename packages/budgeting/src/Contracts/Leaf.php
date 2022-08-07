<?php

namespace Kevariable\Budgeting\Contracts;

interface Leaf
{
    public function calculateBudget(): int;
}
