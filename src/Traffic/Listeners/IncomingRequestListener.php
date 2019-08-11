<?php

namespace Traffic\Listeners;

use Traffic\Utils\Traffic;

class IncomingRequestListener
{
    private $traffic;

    public function __construct(Traffic $traffic)
    {
        $this->traffic = $traffic;
    }

    public function handle()
    {
        if (config('traffic.logs.text')) {
            $this->traffic->text($this->traffic->getPayload());
        }

        if (config('traffic.logs.json')) {
            $this->traffic->json($this->traffic->getPayload());
        }
    }
}
