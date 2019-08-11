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

    $router->fallback(function() {
       return sprintf("[Traffic]: %s leads to nowhere!", request()->path());
    });

});
