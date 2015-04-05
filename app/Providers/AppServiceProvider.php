<?php
namespace App\Providers;

use App\Presenter\MaterializePaginator;
use Illuminate\Pagination\Paginator;
use Parsedown;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
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
        $this->app->bind("App\Presenter\FeedInterface", "App\Presenter\Feed");
        $this->app->bind("App\Repositories\TagRepositoryInterface", "App\Repositories\Fluent\TagRepository");
        $this->app->bind("App\Repositories\RecipeRepositoryInterface", "App\Repositories\Fluent\RecipeRepository");
        $this->app->bind("App\Repositories\SectionRepositoryInterface", "App\Repositories\Fluent\SectionRepository");
        $this->app->bind("App\Repositories\CategoryRepositoryInterface", "App\Repositories\Fluent\CategoryRepository");
        $this->app->bind(
            "App\Repositories\RecipeTagRepositoryInterface",
            "App\Repositories\Fluent\RecipeTagRepository");
        $this->app->bind(
            "App\Repositories\AnalyticsRepositoryInterface",
            "App\Repositories\Fluent\AnalyticsRepository");

        // view composer
        $this->app->view->composer('elements.sidebar', 'App\Composers\CategoryComposer');
        $this->app->view->composer('home.index', 'App\Composers\FeederComposer');
        $this->app->view->composer('home.index', 'App\Composers\NewsFeederComposer');
        /**
         * ユーザー独自のフィルター実装
         */
        $this->app->router->filter('post.once', 'App\Filters\PostOnceFilter');

        $this->app->bindShared('markdown', function ($app) {
            return new \App\Presenter\Markdown(new \App\Presenter\Parsedown, $app->make("App\Repositories\RecipeRepositoryInterface"));
        });

        Paginator::presenter(function(){
            // return new MaterializePaginator();
        });
    }

}
