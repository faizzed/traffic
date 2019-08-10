<?php

namespace Traffic\Listeners;

use Traffic\Utils\Traffic;

class IncomingRequestListener
{
    public function handle()
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
        Traffic::json(request()->all());
    }

    private function text()
    {
        Traffic::text(request()->all());
    }
}
