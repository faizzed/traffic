<?php

namespace Traffic\Providers;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;
use Traffic\Http\Middleware\TrafficMonitor;

class TrafficServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $config = config('traffic');

        if (isset($config['global']) && $config['global']) {
            $kernel = app()->make(Kernel::class);
            $kernel->pushMiddleware(TrafficMonitor::class);
        }

        if (isset($config['routes']) && $config['routes']) {
            app('router')->aliasMiddleware('traffic', TrafficMonitor::class);
        }

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->publishes([
            __DIR__.'/../config/traffic.php' => config_path('traffic.php'),
        ], 'traffic');
    }
}
