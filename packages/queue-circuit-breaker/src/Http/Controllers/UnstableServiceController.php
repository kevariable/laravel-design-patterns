<?php

namespace Kevariable\QueueCircuitBreaker\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

class UnstableServiceController extends Controller
{
    public function __invoke(): bool
    {
        echo Cache::get('unstable-services');

        if (! Cache::get('unstable-services')) {
            return Cache::remember('unstable-services', ttl: 5, callback: fn () => 1);
        }

        Cache::forget('unstable-services');

        return throw new TooManyRequestsHttpException(
            retryAfter: 5
        );
    }
}
