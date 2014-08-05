<?php
namespace App\Tests\StubRepositories;

use App\Repositories\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    // stub array
    /** @var array  */
    protected $sections = [
        [
            "section_id" => "1",
            "name" => "test1",
            "description" => "test1",
            "position" => "1"
        ],
        [
            "section_id" => "2",
            "name" => "test2",
            "description" => "test2",
            "position" => "1"
        ],
    ];

    /**
     *
     * @param array $attribute
     * @return mixed
     */
    public function addCategory(array $attribute)
    {
        // TODO: Implement addCategory() method.
    }

    /**
     * @param $id
     * @param array $attribute
     * @return mixed
     */
    public function updateCategory($id, array $attribute)
    {
        // TODO: Implement updateCategory() method.
    }

    /**
     * @return array|static[]
     */
    public function getCategories()
    {
        // TODO: Implement getCategories() method.
    }

    /**
     * @param $column
     * @param $key
     * @return \Illuminate\Database\Query\Builder|mixed|static
     */
    public function getCategoryList($column, $key)
    {
        // TODO: Implement getCategoryList() method.
    }

    /**
     * @param $sectionId
     * @return array|static[]
     */
    public function getCategoryFromSection($sectionId)
    {
        // TODO: Implement getCategoryFromSection() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCategory($id)
    {
        // TODO: Implement getCategory() method.
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getCategoryFromSlug($slug)
    {
        // TODO: Implement getCategoryFromSlug() method.
    }

    /**
     * @return mixed
     */
    public function getNavigationCategory()
    {
        // TODO: Implement getNavigationCategory() method.
    }


}