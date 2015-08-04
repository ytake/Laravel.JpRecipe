<?php

use Mockery as m;

class SectionTest extends \TestCase
{

    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    /** @var \App\DataAccess\Fluent\Section */
    protected $section;

    public function setUp()
    {
        parent::setUp();
        $dbMock = m::mock($this->app['db'])->makePartial();
        $dbMock->shouldReceive('connection')->andReturn(
            \DB::connection(\DB::getDefaultConnection())
        );
        $this->section = new \App\DataAccess\Fluent\Section(
            $dbMock
        );
        $this->runDatabaseMigrations();
        $this->seed();
    }

    public function testDataFind()
    {
        $result = $this->section->find(1);
        $this->assertInstanceOf('stdClass', $result);
        $this->assertObjectHasAttribute('section_id', $result);
        $this->assertObjectHasAttribute('name', $result);
        $this->assertObjectHasAttribute('description', $result);
        $this->assertObjectHasAttribute('position', $result);
        $this->assertObjectHasAttribute('created_at', $result);
        $this->assertObjectHasAttribute('updated_at', $result);
    }

    public function testDataSectionByOrder()
    {
        $result = $this->section->getSections();
        $this->assertNotSame(0, count($result));
    }
}
