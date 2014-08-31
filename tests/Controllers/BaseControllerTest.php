<?php
namespace App\Tests\Controllers\Api;

use App\Controllers\BaseController;
use App\Tests\TestCase;

class BaseControllerTest extends TestCase
{
    /** @var BaseController  */
    protected $controller;
    public function setUp()
    {
        parent::setUp();
        $this->controller = new BaseController();
    }

    public function testInstance()
    {
        $this->assertInstanceOf('App\Controllers\BaseController', $this->controller);
    }

    public function testHidden()
    {
        $reflectionMethod = $this->getProtectMethod($this->controller, 'setHiddenVars');
        $tag = $reflectionMethod->invokeArgs(new $this->controller, ['array' => ['key' => 'test']]);
        $this->assertSame('<input name="key" type="hidden" value="test">', $tag);
    }

    public function testTitle()
    {
        $reflectionMethod = $this->getProtectMethod($this->controller, 'title');
        $reflectionMethod->invokeArgs(new $this->controller, ['title' => 'testing']);
        $section = \View::getSections();
        $this->assertSame("Laravel Recipes日本語版 | testing", $section['title']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testView()
    {
        $reflectionMethod = $this->getProtectMethod($this->controller, 'view');
        $reflectionMethod->invokeArgs(new $this->controller, ['path' => 'test.index']);
    }
} 