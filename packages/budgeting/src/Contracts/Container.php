<?php

namespace Kevariable\Budgeting\Contracts;

use Illuminate\Support\Collection;

interface Container extends Leaf
{
    public function add(Leaf $budget): static;

    public function all(): Collection;
}
