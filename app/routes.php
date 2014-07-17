<?php
/*
 *
 */
\Route::group(['namespace' => 'App\Controllers'], function () {

    \Route::controller('auth', 'AuthenticateController');
});

\Route::get('/', function() {
    return \View::make('hello');
});
