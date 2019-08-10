<?php

namespace Traffic\Providers;

use Illuminate\Events\EventServiceProvider;
use Traffic\Events\IncomingRequestEvent;
use Traffic\Listeners\IncomingRequestListener;

class TrafficEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        IncomingRequestEvent::class => [
            IncomingRequestListener::class,
        ],
    ];
}
