<?php

namespace Kevariable\QueueCircuitBreaker;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CircuitBreakerServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::prefix('api/circuit-breaker')
            ->middleware('api')
            ->group(__DIR__. '/../router/api.php');
    }
}
