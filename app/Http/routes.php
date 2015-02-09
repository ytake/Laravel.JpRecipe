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

\Route::get('faq', function() {
    $title = \Config::get('recipe.title') . "FAQ";
    \View::inject('title', $title);
    return \View::make('home.faq.index');
});

\Route::group(['namespace' => 'App\Http\Controllers'], function () {

    // for API
    \Route::group(['namespace' => 'Api', 'prefix' => 'api/v1'], function () {
        \Route::resource('recipe', 'RecipeController', ['only' => ['index', 'show']]);
    });

    //
    \Route::get('search', ['uses' => 'SearchController@getIndex', 'as' => 'search.index']);
    //
    \Route::get('feed/{format?}', ['uses' => 'FeedController@getIndex', 'as' => 'feed.index']);
    \Route::get('sitemap.xml', ['uses' => 'FeedController@getSiteMap', 'as' => 'sitemap']);

    // top
    \Route::controller('/', 'HomeController', [
            'getIndex' => 'home.index',
            'getRecipe' => 'home.recipe',
            'getCategory' => 'home.category',
            'getSection' => 'home.section'
        ]
    );
});