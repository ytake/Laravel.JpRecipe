<?php
/*
 * Laravel.JpRecipe Router
 */
\Route::when('auth/callback*', 'guest');
\Route::when('auth/login*', 'guest');
\Route::when('auth/logout*', 'auth');
\Route::when('*', 'csrf', ['post']);
\Route::when('webmaster/recipe*', 'post.once', ['post']);
\Route::when('webmaster/category*', 'post.once', ['post']);

\Route::group(['namespace' => 'App\Controllers'], function () {

    // for API
    \Route::group(['namespace' => 'Api', 'prefix' => 'api/v1'], function () {
        \Route::post('hook', 'HookController@postHook');
        \Route::resource('recipe', 'RecipeController', ['only' => ['index', 'show']]);
    });

    \Route::group(['namespace' => 'WebMaster', 'before' => 'auth', 'prefix' => 'webmaster'], function () {
        \Route::get('/', ['uses' => 'HomeController@getIndex', 'as' => 'webmaster.index']);

        // recipe
        \Route::controller('recipe', 'RecipeController', [
                'getShow' => 'webmaster.recipe.show',
                'getList' => 'webmaster.recipe.list',
                'getForm' => 'webmaster.recipe.form',
                'postConfirm' => 'webmaster.recipe.confirm',
                'postApply' => 'webmaster.recipe.apply',
            ]
        );
        // category
        \Route::controller('category', 'CategoryController', [
                'getShow' => 'webmaster.category.show',
                'getList' => 'webmaster.category.list',
                'getForm' => 'webmaster.category.form',
                'postConfirm' => 'webmaster.category.confirm',
                'postApply' => 'webmaster.category.apply',
            ]
        );
    });
    // authenticate
    \Route::controller('auth', 'AuthenticateController', [
            'getLogin' => 'auth.login',
            'getCallback' => 'auth.callback',
            'getLogout' => 'auth.logout',
        ]
    );
    // top
    \Route::controller('/', 'HomeController', [
            'getIndex' => 'home.index',
            'getRecipe' => 'home.recipe'
        ]
    );
});
