<?php

namespace Traffic\Providers;

use Traffic\Events\IncomingRequestEvent;
use Traffic\Listeners\IncomingRequestListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class TrafficEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        IncomingRequestEvent::class => [
            IncomingRequestListener::class,
        ],
    ];
}
