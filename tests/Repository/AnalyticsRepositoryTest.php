<?php
namespace App\Test\Repository;

use Mockery as m;
use App\Tests\TestCase;
use App\Repositories\Fluent\AnalyticsRepository;

class AnalyticsRepositoryTest extends TestCase
{
    /** @var  AnalyticsRepository */
    protected $repository;
    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->repository = new AnalyticsRepository;
    }

    public function testSetCount()
    {
        $redisMock = m::mock('Predis\Client');
        \Request::shouldReceive('server')->andReturn('127.0.0.1');
        $redisMock->shouldReceive('get')->andReturn(1);
        \Redis::shouldReceive('connection')->andReturn($redisMock);
        $this->assertNull($this->repository->setCount(1));
    }


    public function testDisableKey()
    {
        $redisMock = m::mock('Predis\Client');
        $redisMock->shouldReceive('keys')->andReturnNull();
        \Redis::shouldReceive('connection')->andReturn($redisMock);
        $this->assertNull($this->repository->getDisableKey());
    }

    public function testSortedCount()
    {
        $redisMock = m::mock('Predis\Client');
        $redisMock->shouldReceive('zrevrange')->andReturn([]);
        \Redis::shouldReceive('connection')->andReturn($redisMock);
        $this->assertSame(0, count($this->repository->getSortedCount()));
    }
} 