<?php
namespace App\Tests\Controllers;

use Mockery AS m;
use App\Tests\TestCase;
use App\Controllers\SearchController;

class SearchControllerTest extends TestCase
{
    /** @var SearchController  */
    protected $controller;

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

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testRequestSearch()
    {
        $this->client->request('GET', '/search');
        $this->assertTrue($this->client->getResponse()->isRedirect());
        $this->client->request('POST', '/search');
        $this->client->request('PATCH', '/search');
        $this->client->request('DELETE', '/search');
    }
} 