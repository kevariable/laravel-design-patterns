<?php

namespace Kevariable\QueueCircuitBreaker\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

class UnstableServiceController extends Controller
{
    public function __invoke(): bool
    {
        if (! Cache::get('unstable-services:controller')) {
            return Cache::remember('unstable-services:controller', ttl: 5, callback: fn () => 1);
        }

        Cache::forget('unstable-services:controller');

        return throw new TooManyRequestsHttpException(
            retryAfter: 5
        );
    }
}
