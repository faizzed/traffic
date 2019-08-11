<?php

namespace Traffic\Listeners;

use Traffic\Utils\Traffic;
use Traffic\Events\RoutePerformanceEvent;

class RoutePerformanceListener
{
    private $traffic;

    public function __construct(Traffic $traffic)
    {
        $this->traffic = $traffic;
    }

    public function handle(RoutePerformanceEvent $event)
    {
        $secs = $event->getSecs();
        $req = [
            "path" => request()->path(),
            "sec" => $secs
        ];

        if (config('traffic.logs.text')) {
            $this->traffic->text($req, 'performance');
        }

        if (config('traffic.logs.json')) {
            $this->traffic->json($req, 'performance');
        }
    }
}
