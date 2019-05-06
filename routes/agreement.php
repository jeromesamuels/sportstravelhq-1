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
