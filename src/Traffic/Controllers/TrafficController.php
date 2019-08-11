<?php

namespace Traffic\Controllers;

class TrafficController extends BaseController
{
    public function today($group)
    {
        $fileName = sprintf("%s/traffic-%s.json", storage_path('logs/traffic/requests/json'), now()->format('Y-m-d'));
        $content = file_get_contents($fileName);
        return json_decode($content);
    }

    public function fetchSince()
    {

    }
}
