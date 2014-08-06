<?php
namespace App\Tests\Module;

use App\Extend\Response;
use App\Tests\TestCase;
use Nocarrier\Hal;

class ResponseTest extends TestCase
{
    /** @var Response */
    protected $response;
    public function setUp()
    {
        parent::setUp();
        $this->response = new Response;
    }

    public function testHalResponse()
    {
        $this->assertInstanceOf('App\Extend\Response', $this->response);
        $this->assertInstanceOf('Illuminate\Http\Response', $this->response->hal(new Hal));
    }
} 