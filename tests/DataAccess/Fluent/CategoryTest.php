<?php

use Mockery as m;

class CategoryTest extends \TestCase
{

    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    /** @var \App\DataAccess\Fluent\Category */
    protected $category;

    public function setUp()
    {
        parent::setUp();
        $dbMock = m::mock($this->app['db'])->makePartial();
        $dbMock->shouldReceive('connection')->andReturn(
            \DB::connection(\DB::getDefaultConnection())
        );
        $this->category = new \App\DataAccess\Fluent\Category(
            $dbMock
        );
    }

    public function testNoDataCategoryFromSlug()
    {
        $this->assertNull($this->category->getFromSlug('testing'));
    }

    public function testDataCategoryFromSlug()
    {
        $this->runDatabaseMigrations();
        $this->seed();
        $this->assertInstanceOf('stdClass', $this->category->getFromSlug('testing'));
    }

    public function testDataFindRecord()
    {
        $this->runDatabaseMigrations();
        $this->category->addCategory([
            'section_id' => 1,
            'slug' => 'test',
            'name' => 'test',
            'description' => 'test'
        ]);
        $result = $this->category->find(1);
        $this->assertInstanceOf('stdClass', $result);
        $this->assertObjectHasAttribute('section_id', $result);
        $this->assertObjectHasAttribute('category_id', $result);
        $this->assertObjectHasAttribute('slug', $result);
        $this->assertObjectHasAttribute('name', $result);
        $this->assertObjectHasAttribute('description', $result);
        $this->assertObjectHasAttribute('position', $result);
        $this->assertObjectHasAttribute('created_at', $result);
        $this->assertObjectHasAttribute('updated_at', $result);
    }

    public function testDataUpdate()
    {
        $this->runDatabaseMigrations();
        $this->category->addCategory([
            'section_id' => 1,
            'slug' => 'test',
            'name' => 'test',
            'description' => 'test'
        ]);
        $this->category->update(1, ['name' => 'laravel5.1']);
        $result = $this->category->find(1);
        $this->assertSame('laravel5.1', $result->name);
    }

    public function testDataAll()
    {
        $this->runDatabaseMigrations();
        $this->category->addCategory([
            'section_id' => 1,
            'slug' => 'test',
            'name' => 'test',
            'description' => 'test'
        ]);
        $result = $this->category->getCategories();
        $this->assertNotSame(0, count($result));
    }

    public function testCategoryFromSection()
    {
        $this->runDatabaseMigrations();
        $this->category->addCategory([
            'section_id' => 1,
            'slug' => 'test',
            'name' => 'test',
            'description' => 'test'
        ]);
        $result = $this->category->getCategoryFromSection(1);
        $this->assertCount(1, $result);
    }

    public function testNavigation()
    {
        $this->runDatabaseMigrations();
        $this->category->addCategory([
            'section_id' => 1,
            'slug' => 'test',
            'name' => 'test',
            'description' => 'test'
        ]);
        $result = $this->category->getNavigationCategory();
        $this->assertNotSame(0, count($result));
    }
}
