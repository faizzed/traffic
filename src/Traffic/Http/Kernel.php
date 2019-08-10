<?php

namespace Traffic\Http;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Routing\Router;
use Traffic\Http\Middleware\TrafficMonitor;

class Kernel extends HttpKernel
{
    protected $middleware = [];

    protected $routeMiddleware = [];

    public function __construct(Application $app, Router $router)
    {
        $config = config('traffic');

        if (isset($config['global']) && $config['global']) {
            $this->middleware[] = TrafficMonitor::class;
        }

        if (isset($config['routes']) && $config['routes']) {
            $this->routeMiddleware['traffic'] = TrafficMonitor::class;
        }

        parent::__construct($app, $router);
    }
}
