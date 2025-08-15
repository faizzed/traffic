<?php

namespace Traffic\Http\Middleware;

use Closure;
use Traffic\Events\IncomingRequestEvent;
use Traffic\Events\RoutePerformanceEvent;

class TrafficMonitor
{
    public function handle($request, Closure $next)
    {
        // TODO: block some nasty traffic here
        event(new IncomingRequestEvent());

        // TODO: measure some performance here
        $startTime = microtime(true);
        // TODO: do something with the request here
        $response = $next($request);
        $timeTakenInSecs = number_format((microtime(true) - $startTime), 4);
        event(new RoutePerformanceEvent($timeTakenInSecs));
        // TODO: do something with the response here
        return $response;
    }
}
