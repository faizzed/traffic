<?php

use Illuminate\Routing\Router;

Route::name('traffic.')
    ->prefix('traffic')
    ->middleware('web')
    ->group(function (Router $router) {

    $router->get('/', [
        'as' => 'index',
        'uses' => \Traffic\Controllers\TrafficController::class . '@index',
    ]);

    $router->get('/all/paths', [
        'as' => 'index',
        'uses' => \Traffic\Controllers\TrafficController::class . '@index',
    ]);

    $router->fallback(function() {
        $path = request()->path();
       return "[Traffic]: {$path} leads to nowhere!";
    });

});
