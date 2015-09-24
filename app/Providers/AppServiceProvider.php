<?php

namespace App\Providers;

use App\Presenter\MaterializePaginator;
use Illuminate\Contracts\Events\Dispatcher;
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
    public function boot(Dispatcher $dispatch)
    {
        $dispatch->listen('illuminate.query', function ($query, $bindings, $time, $name) {
            $data = compact('bindings', 'time', 'name');

            // Format binding data for sql insertion
            foreach ($bindings as $i => $binding) {
                if ($binding instanceof \DateTime) {
                    $bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
                } else {
                    if (is_string($binding)) {
                        $bindings[$i] = "'$binding'";
                    }
                }
            }

            // Insert bindings into query
            $query = str_replace(array('%', '?'), array('%%', '%s'), $query);
            $query = vsprintf($query, $bindings);

            \Log::info($query, $data);
        });
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
            \App\Repositories\RecipeTagRepositoryInterface::class,
            \App\DataAccess\Fluent\RecipeTagRepository::class
        );
        */
        $this->app->bind(
            \App\Repositories\RecipeRepositoryInterface::class,
            \App\Repositories\RecipeRepository::class
        );
        $this->app->bind(
            \App\Repositories\CategoryRepositoryInterface::class,
            \App\Repositories\CategoryRepository::class
        );
        $this->app->bind(
            \App\Repositories\FileRepositoryInterface::class,
            \App\Repositories\FileRepository::class
        );
        /*
        $this->app->singleton('markdown', function ($app) {
            return new \App\Presenter\Markdown(new \App\Presenter\Parsedown,
                $app->make("App\Repositories\RecipeRepositoryInterface"));
        });
        */
    }

}
