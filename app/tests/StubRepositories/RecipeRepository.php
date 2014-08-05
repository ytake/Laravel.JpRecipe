<?php
namespace App\Tests\StubRepositories;

use App\Repositories\RecipeRepositoryInterface;

class RecipeRepository implements RecipeRepositoryInterface
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
     * @param int $limit
     * @param int $categoryId
     * @return \Illuminate\Pagination\Paginator
     */
    public function getRecipesPage($limit = 25, $categoryId = null)
    {
        // TODO: Implement getRecipesPage() method.
    }

    /**
     * @param array $attribute
     * @return mixed
     */
    public function addRecipe(array $attribute)
    {
        // TODO: Implement addRecipe() method.
    }

    /**
     * @param $id
     * @param array $attribute
     * @return mixed
     */
    public function updateRecipe($id, array $attribute)
    {
        // TODO: Implement updateRecipe() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecipe($id)
    {
        // TODO: Implement deleteRecipe() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getRecipe($id)
    {
        // TODO: Implement getRecipe() method.
    }

    /**
     * @param $title
     * @return mixed
     */
    public function getRecipeFromTitle($title)
    {
        // TODO: Implement getRecipeFromTitle() method.
    }

    /**
     * @param int $categoryId
     */
    public function getRecipesFromCategory($categoryId = null)
    {
        // TODO: Implement getRecipesFromCategory() method.
    }

    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }


} 