<?php
namespace App\Tests\Composer;

use App\Feed\Reader;
use Mockery AS m;
use App\Composers\FeederComposer;
use App\Tests\TestCase;

class FeederComposerTest extends TestCase
{
    /** @var FeederComposer */
    protected $compose;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->compose = new FeederComposer(new Reader);
    }

    public function testInstance()
    {
        $this->assertInstanceOf("App\Composers\FeederComposer", $this->compose);
    }

    public function testComposer()
    {
        $view = m::mock('Illuminate\View\View');
        $view->shouldReceive('with')->once()->andReturn($view);
        $this->assertNull($this->compose->compose($view));
    }

}
