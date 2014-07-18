<?php
/*
 * Laravel.JpRecipe Router
 */
\Route::group(['namespace' => 'App\Controllers'], function () {
    \Route::controller('auth', 'AuthenticateController', [
            'getLogin' => 'auth.login',
            'getCallback' => 'auth.callback',
            'getLogout' => 'auth.logout',
        ]);
});

\Route::get('/', function() {
    return \View::make('hello');
});
