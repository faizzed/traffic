Traffic
-
Laravel traffic monitor. And much more.

##### Features:
- Log http traffic
- Measure performance on routes
- Includes an api to use your logs in any possible way
- Tremendous amount of information collected on devices and users


##### How to install:
1.  `composer require fyz/traffic`
2. **[Optional]** `php artisan vendor:publish --tag=traffic` for overriding the default config
3. add the following to your config/logging.php file under channels arrays
        
        'traffic' => [
                'text' => [
                    'driver' => 'daily',
                    'path' => storage_path('logs/traffic/text.log'),
                    'level' => 'debug',
                    'days' => 14,
                ],
                'json' => [
                    'driver' => 'daily',
                    'path' => storage_path('logs/traffic/logs.json'),
                    'level' => 'debug',
                    'days' => 14,
                ]
            ],
