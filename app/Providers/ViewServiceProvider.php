<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ViewServiceProvider
 *
 * @package App\Providers
 */
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // view composer
        // $this->app['view']->composer('elements.sidebar', 'App\Composers\CategoryComposer');
        // $this->app['view']->composer('home.index', 'App\Composers\FeederComposer');
        // $this->app['view']->composer('home.index', 'App\Composers\NewsFeederComposer');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
