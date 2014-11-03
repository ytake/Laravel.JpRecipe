<?php
namespace App\Test\Repository;

use Mockery as m;
use App\Tests\TestCase;
use App\Repositories\Fluent\CategoryRepository;

class CategoryRepositoryTest extends TestCase
{
    /** @var CategoryRepository */
    protected $repository;
    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->repository = new CategoryRepository;
    }

    public function testAddCategory()
    {
        $string = 'testing';
        $mock = m::mock('Illuminate\Support\Str');
        $mock->shouldReceive('slug')->with($string)->andReturn($this->trimmer($string));

        $builderMock = m::mock('Illuminate\Database\Query\Builder');
        $connectionMock = m::mock('lluminate\Database\Connection');
        \DB::shouldReceive('connection')->andReturn($connectionMock);
        $connectionMock->shouldReceive('table')->andReturn($builderMock);
        $builderMock->shouldReceive('insertGetId')->andReturn(1);
        $this->assertSame(1, $this->repository->addCategory(['name' => $string, 'position' => 1]));
    }

    public function testGetCategoryPosition()
    {
        $position = 1;
        $connectionMock = m::mock('lluminate\Database\Connection');
        \DB::shouldReceive('connection')->andReturn($connectionMock);
        $builderMock = m::mock("\Illuminate\Database\Query\Builder");
        $connectionMock->shouldReceive('table')->andReturn($builderMock);
        $builderMock->shouldReceive('where')->andReturn($builderMock);
        $builderMock->shouldReceive('max')->andReturn($position);
        $method = $this->getProtectMethod($this->repository, 'getCategoryPosition');
        $this->assertSame($position, $method->invokeArgs($this->repository, [$position]));
    }

    protected function trimmer($title, $separator = '-')
    {
        // Convert all dashes/underscores into separator
        $flip = $separator == '-' ? '_' : '-';
        $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);
        $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));
        $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);
        return trim($title, $separator);
    }
} 