<?php
namespace App\Tests;

use Mockery as m;
use App\Filters\PostOnceFilter;

class PostOnceFilterTest extends TestCase
{
    /** @var PostOnceFilter */
    protected $filter;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->filter = new PostOnceFilter();
    }

    public function testInstance()
    {
        $this->assertInstanceOf("App\Filters\PostOnceFilter", $this->filter);
    }

    public function testRedirectForm()
    {
        \Route::shouldReceive('currentRouteName')->andReturn('testing.filter.index');
        $reflectionMethod = $this->getProtectMethod($this->filter, 'redirectForm');
        $this->assertSame('testing.filter.form', $reflectionMethod->invoke($this->filter));
    }

    public function testFilter()
    {
        $controllerMock = m::mock('TestingController');
        new \ReflectionClass($controllerMock);
        \Route::shouldReceive('currentRouteAction')->andReturn("TestingController@getTest");
        \Session::shouldReceive('get')->once()->andReturn(true);
        $this->assertNull($this->filter->filter());
    }
}