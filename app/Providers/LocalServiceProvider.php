<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class LocalServiceProvider
 * @package App\Providers
 */
class LocalServiceProvider extends ServiceProvider
{
    /** @var array */
    protected $providers = [
        'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider' // ideヘルパー
    ];

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->registerServiceProviders();
        }
    }

    /**
     * register local service providers
     */
    protected function registerServiceProviders()
    {
        foreach ($this->providers as $provider) {
            $this->app->register($provider);
        }
    }
}
