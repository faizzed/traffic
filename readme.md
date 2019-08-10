Traffic
-
Laravel traffic monitor. And much more.

#### Features:
- Log http traffic
- Measure performance on routes
- Includes an api to use your logs in any possible way
- Tremendous amount of information collected on devices and users


#### How to install:
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


#### How to use:
This package can log all traffic on all routes or on some specific routes. `config/traffic.php` has those settings for you to configure. 
1. **global**: [true/false] if this set to true all routes will be monitored and vice versa if set to false
2. **routes**: [true/false] if this is set to true, routes containing the middleware tag will be monitored
example:

        // monitor a group of routes
        Route::middleware(['traffic'])->group(function () {
            Route::get('/hey', function() {
                return "hello!";
            });
        });
        
        // monitor a single route
        Route::get('/hey1', function() {
            return "hello1!";
        })->middleware(['traffic']);
