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
            $this->text();
        }

        if (config('traffic.logs.json')) {
            $this->json();
        }
    }

    private function json()
    {
        $this->traffic->json(
            $this->traffic->getPayload()
        );
    }

    private function text()
    {
        $this->traffic->text(
            json_encode(
                $this->traffic->getPayload()
            )
        );
    }
}
