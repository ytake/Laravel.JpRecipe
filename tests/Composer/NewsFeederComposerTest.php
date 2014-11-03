<?php
namespace App\Tests\Composer;

use Mockery AS m;
use App\Feed\Reader;
use App\Tests\TestCase;
use App\Composers\NewsFeederComposer;

class NewsFeederComposerTest extends TestCase
{
    /** @var NewsFeederComposer */
    protected $compose;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->compose = new NewsFeederComposer(new Reader);
    }

    public function testInstance()
    {
        $this->assertInstanceOf("App\Composers\NewsFeederComposer", $this->compose);
    }

    public function testComposer()
    {
        $view = m::mock('Illuminate\View\View');
        $view->shouldReceive('with')->once()->andReturn($view);
        $this->assertNull($this->compose->compose($view));
    }

}
