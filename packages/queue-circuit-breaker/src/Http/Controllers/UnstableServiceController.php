<?php

namespace Kevariable\QueueCircuitBreaker\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

class UnstableServiceController extends Controller
{
    /**
     * @throws Exception
     */
    public function __invoke(Request $request)
    {
        if ($request->has('server_error')) {
            return Cache::remember('server-error', ttl: 5, callback: fn () => 1);
        }

        if (Cache::get('server-error')) {
            return throw new Exception('Internal Server Error');
        }

        if (! Cache::get('unstable-services')) {
            return Cache::remember('unstable-services', ttl: 5, callback: fn () => 1);
        }

        if (Cache::get('unstable-services')) {
            Cache::forget('unstable-services');

            return throw new TooManyRequestsHttpException(
                retryAfter: 5
            );
        }
    }
}
