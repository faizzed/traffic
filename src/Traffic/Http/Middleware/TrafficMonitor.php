<?php

namespace Traffic\Http\Middleware;

use Closure;
use Traffic\Events\IncomingRequestEvent;

class TrafficMonitor
{
    public function handle($request, Closure $next)
    {
        //todo: block some nasty traffic here..
        event(new IncomingRequestEvent());

        //todo: measure some performance here
        $startTime = microtime(true);
        //todo: do something with the request here
        $response = $next($request);
        $timeTakenInSecs = number_format(( microtime(true) - $startTime), 4);

        // todo: do something with the response here
        return $response;
    }
}
