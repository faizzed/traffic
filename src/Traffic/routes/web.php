<?php

use Illuminate\Routing\Router;

Route::name('traffic.')
    ->prefix('traffic')
    ->middleware('web')
    ->group(function (Router $router) {

        $router->any('/logs/{group}', [
            'as' => 'logs.today',
            'uses' => \Traffic\Controllers\TrafficController::class . '@today',
        ]);

        $router->any('/logs/{group}/since/{days}', [
            'as' => 'logs.since.days',
            'uses' => \Traffic\Controllers\TrafficController::class . '@fetchSince',
        ]);

        $router->fallback(function() {
           return sprintf("[Traffic]: %s leads to nowhere!", request()->path());
        });

});
