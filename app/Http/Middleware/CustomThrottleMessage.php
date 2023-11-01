<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomThrottleMessage extends ThrottleRequests
{
    public function handle($request, Closure $next, $maxAttempts, $decayMinutes)
    {
        $response = parent::handle($request, $next, $maxAttempts, $decayMinutes);

        if ($this->limiter->attempts($this->resolveRequestSignature($request)) >= $maxAttempts) {
            $time = $this->getTimeUntilNextRetry($request);

            return response()->view('custom.throttle.message', compact('time'))->status(429);
        }

        return $response;
    }
}
