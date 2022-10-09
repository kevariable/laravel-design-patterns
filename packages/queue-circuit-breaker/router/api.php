<?php

use Illuminate\Support\Facades\Route;
use Kevariable\QueueCircuitBreaker\Http\Controllers\UnstableServiceController;

Route::get(uri: 'unstable-service', action: UnstableServiceController::class);
