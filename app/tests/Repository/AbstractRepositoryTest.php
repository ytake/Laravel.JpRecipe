<?php
namespace App\Test\Repository;

use Mockery as m;
use App\Repositories\Fluent\AbstractFluent;
use App\Tests\TestCase;

class FluentTest extends AbstractFluent
{

}

class AbstractRepositoryTest extends TestCase
{
    /** @var FluentTest */
    protected $fluent;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->fluent = new FluentTest;
    }

    public function testInstance()
    {
        $this->assertInstanceOf("App\Test\Repository\FluentTest", $this->fluent);
    }

    public function testAdd()
    {
        $builder = m::mock("\Illuminate\Database\Query\Builder");
        $builder->shouldReceive('table')->once()->andReturn($builder);
        $builder->shouldReceive('insertGetId')->once()->andReturn(1);
        \DB::shouldReceive('connection')->with('master')->once()->andReturn($builder);
        $this->assertSame(1, $this->fluent->add(['hello' => 'testing']));
    }

    public function testAll()
    {
        $builder = m::mock("\Illuminate\Database\Query\Builder");
        $builder->shouldReceive('table')->once()->andReturn($builder);
        $builder->shouldReceive('get')->once()->andReturn(m::mock("stdClass"));
        \DB::shouldReceive('connection')->with('slave')->once()->andReturn($builder);
        $this->assertInstanceOf("stdClass", $this->fluent->all());
    }

    public function testFind()
    {
        $builder = m::mock("\Illuminate\Database\Query\Builder");
        $builder->shouldReceive('table')->once()->andReturn($builder);
        $builder->shouldReceive('where')->once()->andReturn($builder);
        $builder->shouldReceive('first')->once()->andReturn(m::mock("stdClass"));
        \DB::shouldReceive('connection')->with('slave')->once()->andReturn($builder);
        $this->assertInstanceOf("stdClass", $this->fluent->find(1));
    }

    public function testUpdate()
    {
        $builder = m::mock("\Illuminate\Database\Query\Builder");
        $builder->shouldReceive('table')->once()->andReturn($builder);
        $builder->shouldReceive('where')->once()->andReturn($builder);
        $builder->shouldReceive('update')->once()->andReturn(1);
        \DB::shouldReceive('connection')->with('master')->once()->andReturn($builder);
        $this->assertSame(1, $this->fluent->update(1, ['hello' => 'testing']));
    }

    public function testDelete()
    {
        $builder = m::mock("\Illuminate\Database\Query\Builder");
        $builder->shouldReceive('table')->once()->andReturn($builder);
        $builder->shouldReceive('where')->once()->andReturn($builder);
        $builder->shouldReceive('delete')->once()->andReturn(1);
        \DB::shouldReceive('connection')->with('master')->once()->andReturn($builder);
        $this->assertSame(1, $this->fluent->delete(1));
    }

    public function testConnection()
    {
        $this->table = 'testing';
        $builder = m::mock("\Illuminate\Database\Query\Builder");
        \DB::shouldReceive('connection')->with('master')->once()->andReturn($builder);
        $builder->shouldReceive('table')->once()->andReturn($builder);
        $this->assertInstanceOf("\Illuminate\Database\Query\Builder", $this->fluent->getConnection('master'));
    }
}
