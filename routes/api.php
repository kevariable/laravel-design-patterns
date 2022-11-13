<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
   \App\Jobs\Test::dispatch();
});