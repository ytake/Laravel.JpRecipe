<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/
\Route::group(['namespace' => 'App\Controllers'], function () {
    \Route::get('/welcome', ['uses' => 'HomeController@showWelcome', 'as' => 'welcome']);
});

\Route::get('/', function() {
    return \View::make('hello');
});
