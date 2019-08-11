<?php

namespace Traffic\Listeners;

use Traffic\Events\RoutePerformanceEvent;

class RoutePerformanceListener
{
    public function handle(RoutePerformanceEvent $event)
    {
        $secs = $event->getSecs();
    }
}
