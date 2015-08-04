<?php

use Mockery as m;

class CategoryComposerTest extends \TestCase
{
    /** @var \App\Composers\CategoryComposer */
    protected $composer;

    public function setUp()
    {
        parent::setUp();
        $this->app->bind(
            \App\Repositories\CategoryRepositoryInterface::class,
            StubCategoryComposer::class
        );
    }

    public function testAssignCategoryComposer()
    {
        $response = $this->getResponse();
        $assign = $response->original->getData();
        $this->assertArrayHasKey('categories', $assign);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    protected function getResponse()
    {
        $this->app->useStoragePath(base_path('tests/storage'));
        $factory = app('Illuminate\Contracts\View\Factory');
        $factory->addLocation(base_path('tests/resources/views'));
        $factory->composer('composer.category', \App\Composers\CategoryComposer::class);
        return new \Illuminate\Http\Response($factory->make('composer.category'));
    }
}

class StubCategoryComposer implements \App\Repositories\CategoryRepositoryInterface
{
    /**
     * @var array
     */
    protected $params = [
        [
            'name' => 'testing'
        ]
    ];

    public function addCategory(array $attribute)
    {
        // TODO: Implement addCategory() method.
    }

    public function updateCategory($id, array $attribute)
    {
        // TODO: Implement updateCategory() method.
    }

    public function getCategories()
    {
        // TODO: Implement getCategories() method.
    }

    public function getCategoryList($column, $key)
    {
        // TODO: Implement getCategoryList() method.
    }

    public function getCategoryFromSection($sectionId)
    {
        // TODO: Implement getCategoryFromSection() method.
    }

    public function getCategory($id)
    {
        // TODO: Implement getCategory() method.
    }

    public function getCategoryFromSlug($slug)
    {
        // TODO: Implement getCategoryFromSlug() method.
    }

    public function getNavigationCategory()
    {
        return $this->toObject($this->params);
    }

    /**
     * @param $params
     * @return object
     */
    protected function toObject($params)
    {
        if (is_array($params)) {
            foreach($params as $key => $row) {
                if(is_array($row)) {
                    $this->toObject($row);
                }
                $params[$key] = (object) $row;
            }
        }
        return (object) $params;
    }
}