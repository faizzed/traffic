<?php

namespace Traffic\Providers;

use Traffic\Events\IncomingRequestEvent;
use Traffic\Events\RoutePerformanceEvent;
use Traffic\Listeners\IncomingRequestListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Traffic\Listeners\RoutePerformanceListener;

class TrafficEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        IncomingRequestEvent::class => [
            IncomingRequestListener::class,
        ],

        RoutePerformanceEvent::class => [
            RoutePerformanceListener::class,
        ],
    ];
}
