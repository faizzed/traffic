Traffic
-
Traffic is a light weight laravel monitoring package that collect intensive insights. The 
package uses filesystem and cleanup historical data after itself, therefore making it a resources effective solution
for the kind of such a trivial job that its supposed to do. [Unlike database driven packages.]  

#### Features:
- Log http traffic
- Measure performance on routes
- Includes an api to use your logs in any possible way
- [Todo] Tremendous amount of information collected on devices and users


#### How to install:
1.  `composer require fyz/traffic`
2. **[Optional]** `php artisan vendor:publish --tag=traffic` for overriding the default config

#### How to use:
The package will log traffic on all routes by default or on some specific routes. `config/traffic.php` has those settings for you to configure. 
1. **global**: [true/false] log all traffic
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
There is a good amount of data that can be used from the following endpoints

- Fetch logs for today


    [GET/POST] https://host/traffic/logs/{resource}     // resource=requests|performance|devices|users

- Fetch logs since 


    [GET/POST] traffic/logs/{resource}/since/{days}     // resource=same as above
