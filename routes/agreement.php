<?php

use Illuminate\Support\Facades\Route;

/**
 * Routes for all hotel agreements in the system
 *
 * @return void
 */
function agreementRoutes()
{
    Route::get('index', 'Hotel@index')
         ->name('agreement-index');
}

Route::prefix('agreement')
    ->namespace('Agreement')
    ->group(
        function () {
            agreementRoutes();
        }
    );


Route::group(
    ['namespace' => 'Client', 'middleware' => 'auth', 'prefix' => "client"],
    function () {
        Route::get('preferences/index', 'PreferencesController@index')
             ->name('client-preferences-index');
        Route::post('preferences/store', 'PreferencesController@store')
             ->name('client-preferences-store');
    }
);
