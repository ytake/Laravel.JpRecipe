<?php

namespace App\Providers;

use App\Presenter\MaterializePaginator;
use Illuminate\Pagination\Paginator;
use Parsedown;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 *
 * @package App\Providers
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AppServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function boot()
    {

    }

    /**
     * @return void
     */
    public function register()
    {
        // feed provider
        /*
        $this->app->bind(
            \App\Presenter\FeedInterface::class,
            \App\Presenter\Feed::class
        );
        $this->app->bind(
            \App\Repositories\TagRepositoryInterface::class,
            \App\DataAccess\Fluent\TagRepository::class
        );
        $this->app->bind(
            \App\Repositories\RecipeRepositoryInterface::class,
            \App\DataAccess\Fluent\RecipeRepository::class
        );
        $this->app->bind(
            \App\Repositories\SectionRepositoryInterface::class,
            \App\DataAccess\Fluent\SectionRepository::class
        );
        $this->app->bind(
            \App\Repositories\CategoryRepositoryInterface::class,
            \App\DataAccess\Fluent\Category::class
        );
        $this->app->bind(
            \App\Repositories\RecipeTagRepositoryInterface::class,
            \App\DataAccess\Fluent\RecipeTagRepository::class
        );
        $this->app->bind(
            \App\Repositories\AnalyticsRepositoryInterface::class,
            \App\DataAccess\Fluent\AnalyticsRepository::class
        );
        $this->app->bind(
            \App\Repositories\FileRepositoryInterface::class,
            \App\Repositories\FileRepository::class
        );
        */
        // view composer
        $this->app['view']->composer('elements.sidebar', 'App\Composers\CategoryComposer');
        $this->app['view']->composer('home.index', 'App\Composers\FeederComposer');
        $this->app['view']->composer('home.index', 'App\Composers\NewsFeederComposer');

        /*
        $this->app->singleton('markdown', function ($app) {
            return new \App\Presenter\Markdown(new \App\Presenter\Parsedown,
                $app->make("App\Repositories\RecipeRepositoryInterface"));
        });
        */
    }

}
