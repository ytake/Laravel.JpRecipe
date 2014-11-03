<?php
namespace App\Test\Repository;

use Mockery as m;
use App\Tests\TestCase;
use App\Repositories\Fluent\TagRepository;

class TagRepositoryTest extends TestCase
{
    /** @var TagRepository */
    protected $repository;

    /** @var array  */
    protected $array = [
        1 => 'testing',
        2 => 'recipes'
    ];

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->repository = new TagRepository;
    }

    public function testAll()
    {
        $connectionMock = m::mock('lluminate\Database\Connection');
        \DB::shouldReceive('connection')->andReturn($connectionMock);
        $builderMock = m::mock("\Illuminate\Database\Query\Builder");
        $connectionMock->shouldReceive('table')->andReturn($builderMock);
        $builderMock->shouldReceive('where')->andReturn($builderMock);
        $builderMock->shouldReceive('get')->andReturn($this->array);
        $this->assertSame($this->array, $this->repository->getTags());
    }

    public function testFind()
    {
        $position = 1;
        $connectionMock = m::mock('lluminate\Database\Connection');
        \DB::shouldReceive('connection')->andReturn($connectionMock);
        $builderMock = m::mock("\Illuminate\Database\Query\Builder");
        $connectionMock->shouldReceive('table')->andReturn($builderMock);
        $builderMock->shouldReceive('where')->andReturn($builderMock);
        $builderMock->shouldReceive('first')->andReturn($this->array[$position]);
        $this->assertSame($this->array[$position], $this->repository->getTag($position));
    }

    public function testGetTagFromName()
    {
        $name = 'testing';
        $connectionMock = m::mock('lluminate\Database\Connection');
        \DB::shouldReceive('connection')->andReturn($connectionMock);
        $builderMock = m::mock("\Illuminate\Database\Query\Builder");
        $connectionMock->shouldReceive('table')->andReturn($builderMock);
        $builderMock->shouldReceive('where')->andReturn($builderMock);
        $builderMock->shouldReceive('first')->andReturn($this->getTagFromName($name));
        $this->assertSame($this->getTagFromName($name), $this->repository->getTagFromName($name));
    }

    public function testAdd()
    {
        $builderMock = m::mock('Illuminate\Database\Query\Builder');
        $connectionMock = m::mock('lluminate\Database\Connection');
        \DB::shouldReceive('connection')->andReturn($connectionMock);
        $connectionMock->shouldReceive('table')->andReturn($builderMock);
        $builderMock->shouldReceive('insertGetId')->andReturn(1);
        $this->assertSame(1, $this->repository->addTag(['tag_name' => 'jp']));
    }

    protected function getTagFromName($name)
    {
        foreach($this->array as $key => $row) {
            if($row == $name) {
                return [$key => $row];
            }
        }
    }
} 