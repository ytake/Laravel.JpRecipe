<?php
namespace App\Providers;

use Parsedown;
use App\Commands\CleanCommand;
use App\Commands\AddRecipeCommand;
use App\Commands\AddAccountCommand;
use Illuminate\Support\ServiceProvider;
use App\Authenticate\Driver\GithubUserProvider;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $this->registerErrorHandler();
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
        $this->app->bind("App\Repositories\TagRepositoryInterface", "App\Repositories\Fluent\TagRepository");
        $this->app->bind("App\Repositories\UserRepositoryInterface", "App\Repositories\Fluent\UserRepository");
        $this->app->bind("App\Repositories\RecipeRepositoryInterface", "App\Repositories\Fluent\RecipeRepository");
        $this->app->bind("App\Repositories\SectionRepositoryInterface", "App\Repositories\Fluent\SectionRepository");
        $this->app->bind("App\Repositories\CategoryRepositoryInterface", "App\Repositories\Fluent\CategoryRepository");
        $this->app->bind("App\Repositories\RecipeTagRepositoryInterface", "App\Repositories\Fluent\RecipeTagRepository");
        $this->app->bind("App\Repositories\AnalyticsRepositoryInterface", "App\Repositories\Fluent\AnalyticsRepository");

        // view composer
        $this->app->view->composer('elements.sidebar', 'App\Composers\CategoryComposer');
        $this->app->view->composer('home.index', 'App\Composers\FeederComposer');

        /**
         * ユーザー独自のフィルター実装
         */
        $this->app->router->filter('post.once', 'App\Filters\PostOnceFilter');

        $this->app->bindShared('markdown', function($app) {
            return new \App\Presenter\Markdown(new Parsedown, $app->make("App\Repositories\RecipeRepositoryInterface"));
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
                    $app->make("App\Repositories\RecipeRepositoryInterface"),
                    $app->make("App\Repositories\TagRepositoryInterface"),
                    $app->make("App\Repositories\RecipeTagRepositoryInterface")
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
     * register error handler
     */
    protected function registerErrorHandler()
    {
        // production only
        if( $this->app->environment() == 'production') {
            $this->app->error(
                function (NotFoundHttpException $exception) {
                    return $this->app['redirect']->to('/');
                }
            );
        }
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