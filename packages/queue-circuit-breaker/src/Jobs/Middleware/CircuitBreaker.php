<?php

namespace Kevariable\QueueCircuitBreaker\Jobs\Middleware;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Kevariable\QueueCircuitBreaker\Actions\ResolveInternalServerErrorAction;
use Kevariable\QueueCircuitBreaker\Actions\ResolveTooManyRequestAction;
use Kevariable\QueueCircuitBreaker\Contracts\Command;
use Symfony\Component\HttpFoundation\Response as Code;

class CircuitBreaker
{
    public function __invoke(mixed $job, callable $next): void
    {
        try {
            $next($job);
        } catch (RequestException $e) {
            $this->resolve($job, $e->response);
        }
    }

    protected function resolve(mixed $job, Response $response): void
    {
        $resolver = match ($response->status()) {
            Code::HTTP_TOO_MANY_REQUESTS => ResolveTooManyRequestAction::class,
            Code::HTTP_INTERNAL_SERVER_ERROR => ResolveInternalServerErrorAction::class,
            default => null
        };

        $instance = resolve($resolver);

        if ($instance instanceof Command) {
            $instance->execute($job, $response);
        }
    }
}
