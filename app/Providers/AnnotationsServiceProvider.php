<?php
namespace App\Providers;

use Collective\Annotations\AnnotationsServiceProvider as ServiceProvider;

/**
 * Class AnnotationsServiceProvider
 * @package App\Providers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 * @license http://opensource.org/licenses/MIT MIT
 */
class AnnotationsServiceProvider extends ServiceProvider
{

    /**
     * The classes to scan for event annotations.
     *
     * @var array
     */
    protected $scanEvents = [];

    /**
     * The classes to scan for route annotations.
     *
     * @var array
     */
    protected $scanRoutes = [
        'App\Http\Controllers\HomeController',
        'App\Http\Controllers\SearchController',
        'App\Http\Controllers\FeedController',
        'App\Http\Controllers\Api\RecipeController',
    ];

    /**
     * The classes to scan for model annotations.
     *
     * @var array
     */
    protected $scanModels = [];

    /**
     * Determines if we will auto-scan in the local environment.
     *
     * @var bool
     */
    protected $scanWhenLocal = false;

    /**
     * Determines whether or not to automatically scan the controllers
     * directory (App\Http\Controllers) for routes
     *
     * @var bool
     */
    protected $scanControllers = false;

}
