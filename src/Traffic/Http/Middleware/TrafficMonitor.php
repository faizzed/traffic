<?php

namespace Traffic\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class TrafficMonitor
{
    public function handle($request, Closure $next)
    {
        Log::channel('traffic.text')->info("Hello world");
        //todo: block some nasty traffic here..
//        if ($request->age <= 200) {
//            return redirect('home');
//        }

        //todo: add some logging here
//        if ($request->age <= 200) {
//            return redirect('home');
//        }
        //todo: measure some performance here
//        if ($request->age <= 200) {
//            return redirect('home');
//        }
        // todo: do something with the request here
        $response = $next($request);

        // todo: do something with the response here
        return $response;
    }
}
