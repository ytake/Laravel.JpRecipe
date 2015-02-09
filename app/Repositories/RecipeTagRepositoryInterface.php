<?php
namespace App\Repositories;

/**
 * Interface RecipeTagRepositoryInterface
 * @package App\Repositories
 */
interface RecipeTagRepositoryInterface
{

    /**
     * @param $recipeId
     * @param $lifeTime
     * @return mixed
     */
    public function getRecipeTags($recipeId, $lifeTime = 240);

    /**
     * @param $recipeId
     * @return mixed
     */
    public function deleteRecipeTags($recipeId);

    /**
     * @param array $attribute
     * @return mixed
     */
    public function addRecipeTag(array $attribute);

    /**
     * @param $tagId
     * @return mixed
     */
    public function getRecipesFromTag($tagId);
}