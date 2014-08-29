<?php
namespace App\Tests\StubRepositories;

use Mockery as m;
use App\Repositories\RecipeTagRepositoryInterface;

class RecipeTagRepository implements RecipeTagRepositoryInterface
{
    /**
     * @param $recipeId
     * @param $lifeTime
     * @return mixed
     */
    public function getRecipeTags($recipeId, $lifeTime = 240)
    {
        // TODO: Implement getRecipeTags() method.
    }

    /**
     * @param $recipeId
     * @return mixed
     */
    public function deleteRecipeTags($recipeId)
    {
        // TODO: Implement deleteRecipeTags() method.
    }

    /**
     * @param array $attribute
     * @return mixed
     */
    public function addRecipeTag(array $attribute)
    {
        // TODO: Implement addRecipeTag() method.
    }

    /**
     * @param $tagId
     * @return mixed
     */
    public function getRecipesFromTag($tagId)
    {
        // TODO: Implement getRecipesFromTag() method.
    }


}