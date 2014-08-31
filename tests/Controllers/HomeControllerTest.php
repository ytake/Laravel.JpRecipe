<?php
namespace App\Tests\Controllers;

use Mockery as m;
use App\Tests\TestCase;
use App\Controllers\HomeController;

class HomeControllerTest extends TestCase
{
    /** @var HomeController  */
    protected $controller;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        \App::bind("App\\Repositories\\RecipeRepositoryInterface", "App\Tests\StubRepositories\RecipeRepository");
        \App::bind("App\\Repositories\\SectionRepositoryInterface", "App\Tests\StubRepositories\SectionRepository");
        \App::bind("App\\Repositories\\CategoryRepositoryInterface", "App\Tests\StubRepositories\CategoryRepository");
        \App::bind("App\\Repositories\\AnalyticsRepositoryInterface", "App\Tests\StubRepositories\AnalyticsRepository");
        \App::bind("App\\Repositories\\RecipeTagRepositoryInterface", "App\Tests\StubRepositories\RecipeTagRepository");
        $this->controller = new HomeController(
            \App::make("App\\Repositories\\SectionRepositoryInterface"),
            \App::make("App\\Repositories\\CategoryRepositoryInterface"),
            \App::make("App\\Repositories\\RecipeRepositoryInterface"),
            \App::make("App\\Repositories\\AnalyticsRepositoryInterface"),
            \App::make("App\\Repositories\\RecipeTagRepositoryInterface")
        );
    }

    public function testInstance()
    {
        $this->assertInstanceOf("App\Controllers\HomeController", $this->controller);
    }
}