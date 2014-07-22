<?php
namespace App\Providers;

use App\Authenticate\Driver\GithubUser;
use App\Authenticate\Driver\GithubUserProvider;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind("App\Repositories\AclRepositoryInterface", "App\Repositories\Fluent\AclRepository");
        $this->app->bind("App\Repositories\UserRepositoryInterface", "App\Repositories\Fluent\UserRepository");
        $this->app->bind("App\Repositories\CategoryRepositoryInterface", "App\Repositories\Fluent\CategoryRepository");
        $this->app->bind("App\Repositories\RecipeRepositoryInterface", "App\Repositories\Fluent\RecipeRepository");

        // view composer
        $this->app->view->composer('elements.sidebar', 'App\Composers\CategoryComposer');
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
}