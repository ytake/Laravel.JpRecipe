<?php
namespace App\Tests\Presenter;

use App\Presenter\MarkdownFacade;
use App\Tests\TestCase;

class MarkdownFacadeTest extends TestCase
{
    /** @var MarkdownFacade  */
    protected $facade;

    public function setUp()
    {
        parent::setUp();
        $this->facade = new MarkdownFacade;
    }

    public function testAccessor()
    {
        $this->assertInstanceOf('App\Presenter\MarkdownFacade', $this->facade);
        $reflectionMethod = $this->getProtectMethod('App\Presenter\MarkdownFacade', 'getFacadeAccessor');
        $this->assertSame('markdown', $reflectionMethod->invoke(new MarkdownFacade()));
    }

} 