<?php

namespace App\Repositories;

use App\DataAccess\Fluent\Recipe;

/**
 * Class RecipeRepository
 *
 * @package App\Repositories
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class RecipeRepository implements RecipeRepositoryInterface
{
    /** @var Recipe  */
    protected $recipe;

    /**
     * @param Recipe $recipe
     */
    public function __construct(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }

    /**
     * @param int $limit
     * @param int $categoryId
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function getRecipesPage($limit = 25, $categoryId = null)
    {
        // TODO: Implement getRecipesPage() method.
    }

    /**
     * @param array $attribute
     *
     * @return mixed
     */
    public function addRecipe(array $attribute)
    {
        return $this->recipe->add($attribute);
    }

    /**
     * @param       $id
     * @param array $attribute
     *
     * @return mixed
     */
    public function updateRecipe($id, array $attribute)
    {
        // TODO: Implement updateRecipe() method.
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteRecipe($id)
    {
        // TODO: Implement deleteRecipe() method.
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getRecipe($id)
    {
        // TODO: Implement getRecipe() method.
    }

    /**
     * @param $title
     *
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

    /**
     * セクション内でランダムにレシピを取得
     *
     * @param     $sectionId
     * @param int $limit
     *
     * @return array
     */
    public function getRecipeFromSectionByRand($sectionId, $limit = 3)
    {
        // TODO: Implement getRecipeFromSectionByRand() method.
    }

    /**
     * @param int $limit
     *
     * @return mixed
     */
    public function getLatestRecipe($limit = 5)
    {
        // TODO: Implement getLatestRecipe() method.
    }

    /**
     * @param array $text
     * @param int   $current
     * @param int   $limit
     *
     * @return mixed
     */
    public function getRecipesFromText(array $text, $current = 1, $limit = 25)
    {
        // TODO: Implement getRecipesFromText() method.
    }

    /**
     * @param $recipeId
     *
     * @return \stdClass
     */
    public function getPrevNextRecipes($recipeId)
    {
        // TODO: Implement getPrevNextRecipes() method.
    }

}