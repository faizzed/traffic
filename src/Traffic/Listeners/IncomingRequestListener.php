<?php

namespace Traffic\Listeners;

use Traffic\Events\IncomingRequestEvent;
use Traffic\Utils\Traffic;

class IncomingRequestListener
{
    public function handle(IncomingRequestEvent $request)
    {
        $this->log();
    }

    private function log()
    {
        if (config('traffic.files.text')) {
            $this->text();
        }

        if (config('traffic.files.json')) {
            $this->json();
        }
    }

    private function json()
    {
        Traffic::text(request()->json());
    }

    private function text()
    {
        Traffic::text(request()->all());
    }
}
