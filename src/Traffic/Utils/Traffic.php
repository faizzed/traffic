<?php

namespace Traffic\Utils;

use Illuminate\Filesystem\Filesystem;

class Traffic
{
    private $fileSystem;
    private $requestsLogs;
    private $performanceLogs;
    private $days;

    public function __construct(Filesystem $filesystem)
    {
        $this->fileSystem = $filesystem;
        $this->requestsLogs = sprintf("%s/%s", config('traffic.logs.dir'), 'requests');
        $this->performanceLogs = sprintf("%s/%s", config('traffic.logs.dir'), 'performance');
        $this->days = config('traffic.logs.days');
    }

    public static function getPayload()
    {
       return [
            'host' => request()->getHost(),
            'port' => request()->getPort(),
            'schema' => request()->getScheme(),
            'path' => request()->path(),
            'method' => request()->method(),
            'ajax' => request()->ajax(),
            'action'  => request()->route()->action['uses'] ?? '',
            'params' => request()->all(),
            'user' => request()->user()->email ?? '',
            'ip' => request()->ip(),
            'user-agent' => request()->userAgent(),
        ];
    }

    public function text($message, $type = 'requests')
    {
        $directory = $this->{$type."Logs"};
        $textLogs = sprintf("%s/text", $directory);

        if (!is_dir($textLogs)) {
            mkdir($textLogs, 0755, true);
        }

        $fileName = sprintf("%s/%s-%s.log",$textLogs,'traffic', now()->format('Y-m-d'));
        $message = json_encode($message);
        $timeStamp = now()->format('Y-m-d H:i:s');
        $message = "[{$timeStamp}] .INFO: {$message}";
        file_put_contents($fileName, $message, FILE_APPEND | LOCK_EX);
    }

    public function json($message, $type = 'requests')
    {
        $directory = $this->{$type."Logs"};
        $jsonLogs = sprintf("%s/json", $directory);

        if (!is_dir($jsonLogs)) {
            mkdir($jsonLogs, 0755, true);
        }

        $fileName = sprintf("%s/%s-%s.json",$jsonLogs,'traffic', now()->format('Y-m-d'));

        if(is_file($fileName)) {

            $content = file_get_contents($fileName);
            $decoded = json_decode($content);

            if (!empty($decoded)) {
                $decoded[] = $message;
                $content = json_encode($decoded, JSON_PRETTY_PRINT);
                unlink($fileName);
            }

        }else{
            $content = json_encode([$message], JSON_PRETTY_PRINT);
        }

        file_put_contents($fileName, $content, FILE_APPEND | LOCK_EX);
    }

    //todo: remove logs older then $this->days
    // the idea here is that it will be called on each request which isn't a very bright solution
    private function removeLogs($dir)
    {
    }
}
