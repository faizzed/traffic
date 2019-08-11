<?php

return [
    'global' => true,
    'routes' => false,
    'logs' => [
        'dir' => sprintf('%s', storage_path('logs/traffic')),
        'days' => 10,
        'text' => true,
        'json' => true
    ]
];
