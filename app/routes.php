<?php
/*
 * Laravel.JpRecipe Router
 */
\Route::when('auth/callback*', 'guest');
\Route::when('auth/login*', 'guest');
\Route::when('auth/logout*', 'auth');

\Route::group(['namespace' => 'App\Controllers'], function () {

    // for API
    \Route::group(['namespace' => 'Api', 'prefix' => 'api/v1'], function () {
        \Route::resource('recipe', 'RecipeController', ['only' => ['index', 'show']]);
    });

    \Route::group(['namespace' => 'WebMaster', 'before' => 'auth'], function () {
        \Route::get('webmaster', ['uses' => 'HomeController@getIndex', 'as' => 'webmaster.index']);
    });

    \Route::controller('auth', 'AuthenticateController', [
            'getLogin' => 'auth.login',
            'getCallback' => 'auth.callback',
            'getLogout' => 'auth.logout',
        ]
    );
    \Route::controller('/', 'HomeController', ['getIndex' => 'index']);
});
