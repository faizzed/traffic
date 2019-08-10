<?php

namespace Traffic\Utils;

use Illuminate\Support\Facades\Log;

class Traffic
{
    public static function text($message, $flag = 'info')
    {
        return Log::channel('traffic.text')->$flag($message);
    }

    public static function json($message, $flag = 'info')
    {
        return Log::channel('traffic.json')->$flag($message);
    }
}
