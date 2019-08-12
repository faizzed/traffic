<?php

namespace Traffic\Controllers;

class TrafficController extends BaseController
{
    public function today($group)
    {
        $groupDir = sprintf("%s", storage_path("logs/traffic/$group/json"));

        if (!is_dir($groupDir)) {
            return $this->error("$groupDir doesnt exists!");
        }

        $logs = array_diff(scandir($groupDir), array('.', '..'));

        $response = [];

        foreach ($logs as $key => $log) {
            $fileName = "{$groupDir}/$log";
            $content = file_get_contents($fileName);
            $response[$this->getDate($log)] = json_decode($content);
        }

        return $response;
    }

    public function fetchSince()
    {

    }
}
