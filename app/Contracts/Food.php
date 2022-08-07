<?php

namespace App\Contracts;

interface Food
{
    public function resolveForCost(): int;
}