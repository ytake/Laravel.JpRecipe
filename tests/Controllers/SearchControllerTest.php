<?php
namespace App\Tests\Controllers;

use Mockery AS m;
use App\Tests\TestCase;
use App\Controllers\SearchController;

class SearchControllerTest extends TestCase
{
    /** @var SearchController  */
    protected $controller;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        \App::bind("App\Repositories\RecipeRepositoryInterface", "App\Tests\StubRepositories\RecipeRepository");
        $this->controller = new SearchController(\App::make("App\Repositories\RecipeRepositoryInterface"));
    }

    public function testInstance()
    {
        $this->assertInstanceOf('App\Controllers\SearchController', $this->controller);
    }

    public function testIndex()
    {
        $this->assertInstanceOf("Illuminate\Http\RedirectResponse", $this->controller->getIndex());
    }

    public function testRequestSearch()
    {
        $this->client->request('GET', '/search');
        $this->assertTrue($this->client->getResponse()->isRedirect());
    }

    public function testRequestSearchValue()
    {
        \Input::shouldReceive('only')->andReturn(['words' => 'hello']);
        \Input::shouldReceive('get')->andReturn(1);
        \Input::shouldReceive('input')->andReturn('');
        $reflectionProperty = $this->getProtectProperty($this->controller, 'layout');
        $reflectionProperty->setValue($this->controller, new \stdClass);

        $reflectionMethod = $this->getProtectMethod($this->controller, 'view');
        $reflectionMethod->invokeArgs($this->controller, ['home.search.index']);
        $this->assertNull($this->controller->getIndex());
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testNotAllowedAccess()
    {
        $this->client->request('POST', '/search');
        $this->client->request('PATCH', '/search');
        $this->client->request('DELETE', '/search');
    }

    public function testProperty()
    {
        $reflectionProperty = $this->getProtectProperty($this->controller, 'recipe');
        $this->assertInstanceOf("App\Tests\StubRepositories\RecipeRepository", $reflectionProperty->getValue($this->controller));
    }
} 