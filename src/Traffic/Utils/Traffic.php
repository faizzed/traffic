<?php

namespace Traffic\Utils;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Log;

class Traffic
{
    private $fileSystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->fileSystem = $filesystem;
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

    public function text($message, $flag = 'info')
    {
        Log::channel('traffic.text')->$flag($message);
    }

    public function json($message)
    {
        $config = config('logging.channels.traffic');

        if (empty($config)) {
            return;
        }

        $path = $config['json']['path'] ?? '';

        if (!$path) {
            return;
        }

        $directory = sprintf("%s", storage_path('logs/traffic/json'));

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $fileName = sprintf("%s/%s-%s.json",storage_path('logs/traffic/json'),'traffic', now()->format('Y-m-d'));

        $content = file_get_contents($fileName);
        $decoded = json_decode($content);

        if (!empty($decoded)) {
            $decoded[] = $message;
            $content = json_encode($decoded, JSON_PRETTY_PRINT);
            unlink($fileName);
        }else{
            $content = json_encode([$message], JSON_PRETTY_PRINT);
        }

        file_put_contents($fileName, $content, FILE_APPEND | LOCK_EX);
    }
}
