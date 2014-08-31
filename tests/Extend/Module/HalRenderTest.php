<?php
namespace App\Tests\Extend;

use App\Extend\Module\HalRender;
use App\Tests\TestCase;
use Nocarrier\Hal;

class HalRenderTest extends TestCase
{
    /** @var HalRender */
    protected $render;
    /** @var Hal */
    protected $hal;

    public function setUp()
    {
        parent::setUp();
        $this->hal = new Hal;
        $this->render = new HalRender($this->hal);
    }

    public function testRender()
    {
        $reflectionProperty = $this->getProtectProperty(get_class($this->render), 'headers');
        $header = $reflectionProperty->getValue($this->render);
        $this->assertInternalType('array', $header);
        $this->assertSame("application/hal+json", $header['Content-Type']);

        $render = $this->render->render($this->hal, 200, $header);
        $this->assertInstanceOf('Illuminate\Http\Response', $render);
        $this->assertSame('application/hal+json', $render->headers->get('content-type'));
    }
} 