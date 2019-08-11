<?php

namespace Traffic\Events;

class RoutePerformanceEvent
{
    private $secs;

    public function __construct($secs) {
        $this->secs = $secs;
    }

    public function getSecs()
    {
        return $this->secs;
    }
}
