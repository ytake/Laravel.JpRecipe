<?php
namespace App\Tests\StubRepositories;

use App\Repositories\RecipeRepositoryInterface;

class RecipeRepository implements RecipeRepositoryInterface
{

    /**
     * セクション内でランダムにレシピを取得
     * @param $sectionId
     * @param int $limit
     * @return array
     */
    public function getRecipeFromSectionByRand($sectionId, $limit = 3)
    {
        // TODO: Implement getRecipeFromSectionByRand() method.
    }

    /**
     * @param int $limit
     * @return mixed
     */public function getLatestRecipe($limit = 5)
    {
        // TODO: Implement getLatestRecipe() method.
    }

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
        return [];
    }


} 