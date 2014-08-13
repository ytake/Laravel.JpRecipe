<?php
namespace App\Tests\Composer;

use Mockery AS m;
use App\Composers\CategoryComposer;
use App\Tests\TestCase;

class CategoryComposerTest extends TestCase
{
    /** @var CategoryComposer */
    protected $compose;

    public function setUp()
    {
        parent::setUp();
        \App::bind("App\Repositories\CategoryRepositoryInterface", "App\Tests\StubRepositories\CategoryRepository");
        $this->compose = new CategoryComposer(
            \App::make("App\Repositories\CategoryRepositoryInterface")
        );
    }

    public function testInstance()
    {
        $this->assertInstanceOf("App\Composers\CategoryComposer", $this->compose);
    }

    public function testCompose()
    {
        $reflection = $this->getProtectProperty($this->compose, 'category');
        $this->assertInstanceOf("App\Tests\StubRepositories\CategoryRepository", $reflection->getValue($this->compose));
    }
}
