<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ApplicationServiceProvider
 * @package App\Providers
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ApplicationServiceProvider extends ServiceProvider
{

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
    }
}