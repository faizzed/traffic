<?php

namespace Traffic\Controllers;

class TrafficController extends BaseController
{
    public function index()
    {
        $fileName = sprintf("%s/traffic-%s.json", storage_path('logs/traffic/json'), now()->format('Y-m-d'));
        $content = file_get_contents($fileName);
        return json_decode($content);

        return "Hey! there is nothing here yet!!";
    }
}
