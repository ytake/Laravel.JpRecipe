<?php
namespace App\Tests\Controllers\Api;

use Mockery AS m;
use App\Tests\TestCase;
use App\Controllers\FeedController;

class FeedControllerTest extends TestCase
{
    /** @var FeedController  */
    protected $controller;

    protected $array = [
        [
            'recipe_id' => 1,
            'created_at' => '1970:00:00 00-00-00'
        ],
        [
            'recipe_id' => 2,
            'created_at' => '1970:00:00 00-00-00'
        ],
    ];

    public function setUp()
    {
        parent::setUp();
        \App::bind("App\Repositories\RecipeRepositoryInterface", "App\Tests\StubRepositories\RecipeRepository");
        \App::bind("App\Presenter\FeedInterface", "App\Presenter\Feed");
        $this->controller = new FeedController(
            \App::make("App\Presenter\FeedInterface"),
            \App::make("App\Repositories\RecipeRepositoryInterface")
        );
    }

    public function testInstance()
    {
        $this->assertInstanceOf('App\Controllers\FeedController', $this->controller);
    }

    public function testIndex()
    {
        $this->client->request('GET', '/feed/atom');
        $this->assertTrue($this->client->getResponse()->isOk());
        $this->assertInstanceOf('Illuminate\Http\Response', $this->client->getResponse());
        $request = $this->controller->getIndex();
        $this->assertInstanceOf("Illuminate\Http\Response", $request);
        $this->assertSame('application/atom+xml', $request->headers->get('content-type'));

        $this->client->request('GET', '/feed/rss');
        $this->assertTrue($this->client->getResponse()->isOk());
        $this->assertInstanceOf('Illuminate\Http\Response', $this->client->getResponse());
        $request = $this->controller->getIndex('rss');
        $this->assertInstanceOf("Illuminate\Http\Response", $request);
        $this->assertSame('application/rss+xml; charset=utf-8', $request->headers->get('content-type'));
    }

    public function testSiteMap()
    {
        $response = $this->controller->getSiteMap();
        $this->assertInstanceOf("Illuminate\Http\Response", $response);
        $this->assertSame('text/xml; charset=utf-8', $response->headers->get('content-type'));
        $this->client->request('GET', '/sitemap.xml');
        $this->assertTrue($this->client->getResponse()->isOk());
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testSiteMapError()
    {
        $this->client->request('POST', '/sitemap.xml');
        $this->client->request('PATCH', '/sitemap.xml');
        $this->client->request('DELETE', '/sitemap.xml');
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testNotFoundUri()
    {
        $this->client->request('PUT', '/feed/atom');
        $this->client->request('POST', '/feed/rss');
        $this->client->request('GET', '/feed/xml');
        $this->client->request('DELETE', '/feed/xml');
    }
} 