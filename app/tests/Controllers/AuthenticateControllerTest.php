<?php
namespace App\Tests\Controllers;

use Mockery as m;
use App\Controllers\AuthenticateController;
use App\Tests\TestCase;

class AuthenticateControllerTest extends TestCase
{
    /** @var AuthenticateController  */
    protected $controller;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        \App::bind("App\\Authenticate\\AuthenticateInterface", "App\Tests\StubRepositories\AuthenticateRepository");
        $this->controller = new AuthenticateController(
            \App::make("App\\Authenticate\\AuthenticateInterface")
        );
    }

    public function testInstance()
    {
        $this->assertInstanceOf("App\Controllers\AuthenticateController", $this->controller);
    }

    public function testLogin()
    {
        $this->call('GET', 'auth/login');
        $this->assertResponseOk();
        \View::composer('auth.login', function($view) {
                $this->assertArrayHasKey('login_url', $view->getData());
            });
    }

    public function testCallback()
    {
        \Auth::shouldReceive('attempt')->once()->andReturn(true);
        $this->client->request('GET', 'auth/callback');
        $this->assertTrue($this->client->getResponse()->isRedirect());
    }

    public function testLogout()
    {
        $this->client->request('GET', 'auth/logout');
        $this->assertTrue($this->client->getResponse()->isRedirect());
    }
} 