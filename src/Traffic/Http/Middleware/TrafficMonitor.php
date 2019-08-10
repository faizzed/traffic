<?php

namespace Traffic\Http\Middleware;

use Closure;
use Traffic\Events\IncomingRequestEvent;

class TrafficMonitor
{
    public function handle($request, Closure $next)
    {
        //todo: block some nasty traffic here..

        //todo: add some logging here
        event(new IncomingRequestEvent());
        //todo: measure some performance here
        //todo: do something with the request here
        $response = $next($request);

        // todo: do something with the response here
        return $response;
    }
}
