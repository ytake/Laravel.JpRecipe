<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider {


	public function register()
	{
		if ($this->app->environment("local")) {
			$this->app->register('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider');
		}
		config([
			//
		]);
	}

}
