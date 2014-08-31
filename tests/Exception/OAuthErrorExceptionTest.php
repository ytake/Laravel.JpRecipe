<?php
namespace App\Tests\Exception;

use App\Tests\TestCase;
use App\Exception\OAuthErrorException;

class OAuthErrorExceptionTest extends TestCase
{
    /** @var OAuthErrorException  */
    protected $exception;

    public function setUp()
    {
        parent::setUp();
        $this->exception = new OAuthErrorException('error');
    }

    /**
     * @expectedException \App\Exception\OAuthErrorException
     */
    public function testException()
    {
        $this->assertSame('error', $this->exception->getMessage());
        $this->assertSame(400, $this->exception->getCode());
        throw $this->exception;
    }
} 