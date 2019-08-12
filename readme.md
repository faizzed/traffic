Traffic
-
Traffic is a minimal light weight laravel monitoring package that collect intensive insights. The 
package use filesystem and cleanup historical data. Therefore making it a resources effective solution
for such a trivial job that's its supposed to do. [Unlike database driven packages.]  

#### Features:
- Log http traffic
- Measure performance on routes
- Includes an api to use your logs in any possible way
- Tremendous amount of information collected on devices and users


#### How to install:
1.  `composer require fyz/traffic`
2. **[Optional]** `php artisan vendor:publish --tag=traffic` for overriding the default config

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

#### How to visualize:
The point of collecting this data is to make use of it, and therefore there is an api that can help you with that.

    traffic/logs/[requests|performance|devices|users]

will fetch logs for today

    traffic/logs/[requests|performance|devices|users]/since/{days}

will fetch logs for today-days
