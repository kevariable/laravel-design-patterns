<?php

use Illuminate\Support\Facades\Route;
use Kevariable\QueueCircuitBreaker\Http\Controllers\UnstableServiceController;
use Kevariable\QueueCircuitBreaker\Http\Controllers\CircuitBreakerController;

Route::get(uri: 'unstable-service', action: UnstableServiceController::class);
Route::post(uri: 'handling', action: CircuitBreakerController::class);
