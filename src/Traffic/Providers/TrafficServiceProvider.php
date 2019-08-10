<?php

namespace Traffic\Providers;

use Illuminate\Support\ServiceProvider;

class TrafficServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->publishes([
            __DIR__.'/../config/traffic.php' => config_path('traffic.php'),
        ], 'traffic');
    }
}
