<?php

return [
    'global' => true,
    'routes' => false,
    'logs' => [
        'dir' => storage_path('logs/traffic'),
        'days' => 10,
        'text' => true,
        'json' => true,
    ]
];
