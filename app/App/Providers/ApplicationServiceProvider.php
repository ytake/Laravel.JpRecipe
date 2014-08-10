<?php
namespace App\Providers;

use App\Authenticate\Driver\GitHub;
use App\Commands\AddAccountCommand;
use App\Commands\CleanCommand;
use Parsedown;
use App\Commands\AddRecipeCommand;
use Illuminate\Support\ServiceProvider;
use App\Authenticate\Driver\GithubUserProvider;

/**
 * Class ApplicationServiceProvider
 * @package App\Providers
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ApplicationServiceProvider extends ServiceProvider
{


    public function boot()
    {
        $this->registerAuthenticateDriver();
        $this->registerCommands();
    }

    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        // application service provider
        $this->app->bind("GuzzleHttp\\ClientInterface", "GuzzleHttp\\Client");
        //
        $this->app->bind("App\\Authenticate\\AuthenticateInterface", function($app) {
            return $app->make("App\\Authenticate\\Driver\\GitHub", [$app->make("GuzzleHttp\\ClientInterface")]);
        });
        // feed provider
        $this->app->bind("App\Presenter\FeedInterface", "App\Presenter\Feed");

        $this->app->bind("App\Repositories\AclRepositoryInterface", "App\Repositories\Fluent\AclRepository");
        $this->app->bind("App\Repositories\UserRepositoryInterface", "App\Repositories\Fluent\UserRepository");
        $this->app->bind("App\Repositories\RecipeRepositoryInterface", "App\Repositories\Fluent\RecipeRepository");
        $this->app->bind("App\Repositories\SectionRepositoryInterface", "App\Repositories\Fluent\SectionRepository");
        $this->app->bind("App\Repositories\CategoryRepositoryInterface", "App\Repositories\Fluent\CategoryRepository");
        $this->app->bind("App\Repositories\AnalyticsRepositoryInterface", "App\Repositories\Fluent\AnalyticsRepository");

        // view composer
        $this->app->view->composer('elements.sidebar', 'App\Composers\CategoryComposer');
        $this->app->view->composer('elements.header', 'App\Composers\CategoryComposer');

        /**
         * ユーザー独自のフィルター実装
         */
        $this->app->router->filter('post.once', 'App\Filters\PostOnceFilter');

        $this->app->bindShared('markdown', function($app) {
            return new \App\Presenter\Markdown(new Parsedown);
        });
    }

    /**
     * bootで実行
     * extend authenticate driver
     * @access private
     * @return void
     */
    private function registerAuthenticateDriver()
    {
        $this->app['auth']->extend('github', function($app) {
            return new \Illuminate\Auth\Guard(
                new GithubUserProvider(
                    $app->make("App\Repositories\AclRepositoryInterface"),
                    $app->make("App\Repositories\UserRepositoryInterface")
                ),
                $app['session.store']
            );
        });
    }

    /**
     * register commands
     */
    protected function registerCommands()
    {
        // recipe追加コマンド
        $this->app['jp-recipe.add'] = $this->app->share(function($app) {
                return new AddRecipeCommand(
                    $app->make("App\Repositories\CategoryRepositoryInterface"),
                    $app->make("App\Repositories\RecipeRepositoryInterface")
                );
            });
        $this->commands('jp-recipe.add');
        // cleanupコマンド
        $this->app['jp-recipe:cleanup'] = $this->app->share(function($app) {
                return new CleanCommand(
                    $app->make("App\Repositories\AnalyticsRepositoryInterface")
                );
            });
        $this->commands('jp-recipe:cleanup');
        // アクセス許可ユーザー追加
        $this->app['jp-recipe:add-allow-account'] = $this->app->share(function($app) {
                return new AddAccountCommand(
                    $app->make("App\\Authenticate\\Driver\\GitHub", [$app->make("GuzzleHttp\\ClientInterface")]),
                    $app->make("App\Repositories\AclRepositoryInterface")
                );
            });
        $this->commands('jp-recipe:add-allow-account');
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            'jp-recipe.add',
            'jp-recipe:cleanup',
            'jp-recipe:add-allow-account'
        ];
    }
}