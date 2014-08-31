<?php
namespace App\Test\Repository;

use Mockery as m;
use App\Tests\TestCase;
use App\Repositories\Fluent\AclRepository;

class AclRepositoryTest extends TestCase
{
    /** @var  AclRepository */
    protected $repository;
    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->repository = new AclRepository;
    }

    public function testControl()
    {
        $builderMock = m::mock('Illuminate\Database\Query\Builder');
        $connectionMock = m::mock('lluminate\Database\Connection');
        \DB::shouldReceive('connection')->andReturn($connectionMock);
        $connectionMock->shouldReceive('table')->andReturn($builderMock);
        $builderMock->shouldReceive('where')->andReturn($builderMock);
        $builderMock->shouldReceive('remember')->andReturn($builderMock);
        $builderMock->shouldReceive('first')->andReturn(new \stdClass());
        $this->assertInstanceOf('stdClass', $this->repository->getAccessControl('testing'));
    }

    public function testSetControl()
    {
        $builderMock = m::mock('Illuminate\Database\Query\Builder');
        $connectionMock = m::mock('lluminate\Database\Connection');
        \DB::shouldReceive('connection')->andReturn($connectionMock);
        $connectionMock->shouldReceive('table')->andReturn($builderMock);
        $builderMock->shouldReceive('remember')->andReturn($builderMock);
        $builderMock->shouldReceive('insertGetId')->andReturn(1);
        $this->assertSame(1, $this->repository->setAccessControl('testing'));
    }
} 