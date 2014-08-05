<?php
namespace App\Tests\StubRepositories;

use App\Repositories\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    // stub array
    /** @var array  */
    protected $categories = [
        [
            "category_id" => 1,
            "section_id" => 1,
            "slug" => "help",
            "name" => "Help",
            "description" => "testing",
            "position" => "1",
            "created_at" => '1970-01-01 00:00:00',
            "updated_at" => '1970-01-01 00:00:00',
        ],
        [
            "category_id" => 2,
            "section_id" => 2,
            "slug" => "help",
            "name" => "Help",
            "description" => "testing",
            "position" => "1",
            "created_at" => '1970-01-01 00:00:00',
            "updated_at" => '1970-01-01 00:00:00',
        ],
        [
            "category_id" => 3,
            "section_id" => 3,
            "slug" => "help",
            "name" => "Help",
            "description" => "testing",
            "position" => "1",
            "created_at" => '1970-01-01 00:00:00',
            "updated_at" => '1970-01-01 00:00:00',
        ],
        [
            "category_id" => 4,
            "section_id" => 4,
            "slug" => "help",
            "name" => "Help",
            "description" => "testing",
            "position" => "1",
            "created_at" => '1970-01-01 00:00:00',
            "updated_at" => '1970-01-01 00:00:00',
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
        return (object) $this->categories;
    }

    /**
     * @param $column
     * @param $key
     * @return \Illuminate\Database\Query\Builder|mixed|static
     */
    public function getCategoryList($column, $key)
    {

    }

    /**
     * @param $sectionId
     * @return array|static[]
     */
    public function getCategoryFromSection($sectionId)
    {
        $result = [];
        foreach($this->categories as $category) {
            if($category['section_id'] == $sectionId) {
                $result[] = (object) $category;
            }
        }
        return $result;
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