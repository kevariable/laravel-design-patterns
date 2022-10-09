<?php

namespace Kevariable\QueueCircuitBreaker\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CircuitBreakerResponse implements Responsable
{
    public function toResponse($request): JsonResponse
    {
        return response()->json([
            'meta' => [
                'status' => Response::HTTP_OK,
            ],
        ]);
    }
}
