<?php
namespace App\Tests\Controllers\Api;

use App\Tests\TestCase;

class RecipeControllerTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        \App::bind("App\Repositories\SectionRepositoryInterface", "App\Tests\StubRepositories\SectionRepository");
    }

    /**
     * @test
     */
    public function testRecipeList()
    {
        $this->client->request('GET', '/api/v1/recipe');
        $this->assertTrue($this->client->getResponse()->isOk());
    }
} 