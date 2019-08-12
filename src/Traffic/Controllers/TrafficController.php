<?php

namespace Traffic\Controllers;

class TrafficController extends BaseController
{
    public function today($group)
    {
        $this->validateResource($group);

        $logs = sprintf("%s/traffic-%s.json", storage_path("logs/traffic/$group/json"), now()->format('Y-m-d'));

        if (!is_file($logs)) {
            return $this->error("$logs doesnt exists!");
        }

        $content = file_get_contents($logs);
        $content = json_decode($content);

        return $this->success($content, "Today's logs");
    }

    public function fetchSince($group, $day)
    {
        $this->validateResource($group);

        $groupDir = sprintf("%s", storage_path("logs/traffic/$group/json"));

        if (!is_dir($groupDir)) {
            return $this->error("$groupDir doesnt exists!");
        }
        $now = now()->format('Y-m-d');
        $since = strtotime("{$now} - $day days");
        $logs = array_diff(scandir($groupDir), array('.', '..'));

        $response = [];

        foreach ($logs as $key => $log) {
            $fileName = "{$groupDir}/$log";
            $logsDate = $this->getDate($log);
            if (strtotime($logsDate) > $since) {
                $content = file_get_contents($fileName);
                $response[$logsDate] = json_decode($content);
            }

        }

        return $this->success($response, "");
    }
}
