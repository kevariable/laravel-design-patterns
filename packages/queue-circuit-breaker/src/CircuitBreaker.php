<?php

namespace Kevariable\QueueCircuitBreaker;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\Response;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Kevariable\QueueCircuitBreaker\Actions\ResolveTooManyRequestAction;
use Kevariable\QueueCircuitBreaker\Contracts\Command;
use Symfony\Component\HttpFoundation\Response as Code;

class CircuitBreaker implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue;

    public function __invoke()
    {
        return value(
            value: fn (Response $response) => $this->resolve($response, function () {
                //
            }),

            response: Http::acceptJson()
                ->timeout(5)
                ->get(url('/api/circuit-breaker/unstable-service'))
        );
    }

    protected function resolve(Response $response, callable $callback): mixed
    {
        $resolver = match ($response->status()) {
            Code::HTTP_TOO_MANY_REQUESTS => ResolveTooManyRequestAction::class,

            default => null
        };

        $instance = resolve($resolver);

        if ($instance instanceof Command) {
            $instance->execute($this, $response);

            return true;
        }

        return $callback();
    }
}
