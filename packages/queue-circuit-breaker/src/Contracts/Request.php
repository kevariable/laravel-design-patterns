<?php

namespace Kevariable\QueueCircuitBreaker\Contracts;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;

interface Request
{
    /**
     * @return Response
     * @throws RequestException
     */
    public function execute(): Response;
}
