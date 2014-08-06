<?php
namespace App\Tests\Controllers\Api;

use Nocarrier\Hal;
use App\Controllers\Api\RecipeController;
use App\Tests\TestCase;

class RecipeControllerTest extends TestCase
{
    /** @var RecipeController  */
    protected $controller;
    public function setUp()
    {
        parent::setUp();
        \App::bind("App\Repositories\SectionRepositoryInterface", "App\Tests\StubRepositories\SectionRepository");
        \App::bind("App\Repositories\CategoryRepositoryInterface", "App\Tests\StubRepositories\CategoryRepository");
        \App::bind("App\Repositories\RecipeRepositoryInterface", "App\Tests\StubRepositories\RecipeRepository");
        $this->controller = new RecipeController(
            \App::make("App\Repositories\SectionRepositoryInterface"),
            \App::make("App\Repositories\CategoryRepositoryInterface"),
            \App::make("App\Repositories\RecipeRepositoryInterface"),
            new Hal
        );
    }

    public function testInstance()
    {
        $this->assertInstanceOf('App\Controllers\Api\RecipeController', $this->controller);
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testRecipeList()
    {
        $this->client->request('GET', '/api/v1/recipe');
        $this->assertTrue($this->client->getResponse()->isOk());
        $this->assertInstanceOf('Illuminate\Http\JsonResponse', $this->client->getResponse());
        $this->client->request('GET', '/api/v1/recipe?format=hal');
        $this->assertInstanceOf('Illuminate\Http\Response', $this->client->getResponse());
        $response = $this->client->getResponse();
        $this->assertSame('application/hal+json', $response->headers->get('content-type'));
        $this->client->request('POST', '/api/v1/recipe');
        $this->client->request('PUT', '/api/v1/recipe');
        $this->client->request('PATCH', '/api/v1/recipe');
        $this->client->request('DELETE', '/api/v1/recipe');
    }

    public function testIndex()
    {
        $this->assertInstanceOf('Illuminate\Http\JsonResponse', $this->controller->index());
    }

    public function testRender()
    {
        $this->assertInstanceOf('Illuminate\Http\JsonResponse', $this->controller->render([], 'json'));
        $this->assertInstanceOf('Illuminate\Http\JsonResponse', $this->controller->render([], 'xml'));
        $this->assertInstanceOf('Illuminate\Http\Response', $this->controller->render(new Hal, 'hal'));
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testShow()
    {
        $this->assertInstanceOf('Illuminate\Http\JsonResponse', $this->controller->show('1'));
        $this->client->request('GET', '/api/v1/recipe/1');
        $this->assertInstanceOf("Illuminate\Http\JsonResponse", $this->client->getResponse());
        $this->assertTrue($this->client->getResponse()->isOk());
        $this->client->request('GET', '/api/v1/recipe/1?format=hal');
        $this->assertInstanceOf("Illuminate\Http\Response", $this->client->getResponse());
        $response = $this->client->getResponse();
        $this->assertSame('application/hal+json', $response->headers->get('content-type'));
        $this->client->request('POST', '/api/v1/recipe/1');
        $this->client->request('PUT', '/api/v1/recipe/1');
        $this->client->request('PATCH', '/api/v1/recipe/1');
        $this->client->request('DELETE', '/api/v1/recipe/1');
        $this->client->request('POST', '/api/v1/recipe/1?format=hal');
        $this->client->request('PUT', '/api/v1/recipe/1?format=hal');
        $this->client->request('PATCH', '/api/v1/recipe/1?format=hal');
        $this->client->request('DELETE', '/api/v1/recipe/1?format=hal');
    }

} 