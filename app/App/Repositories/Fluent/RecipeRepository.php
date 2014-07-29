<?php
namespace App\Repositories\Fluent;

use App\Validates\CustomRule;
use App\Repositories\RecipeRepositoryInterface;

/**
 * Class RecipeRepository
 * @package App\Repositories\Fluent
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class RecipeRepository extends AbstractFluent implements RecipeRepositoryInterface
{

    use CustomRule;

    protected $cacheKey = "recipe:";

    /** @var string */
    protected $table = 'recipes AS recipe';

    /** @var  */
    protected $primary = 'recipe_id';

    /**
     * @param int $limit
     * @return \Illuminate\Pagination\Paginator
     */
    public function getRecipes($limit = 25)
    {
        return $this->getConnection('slave')
            ->join('categories AS cat', 'cat.category_id', '=', 'recipe.category_id')
            ->orderBy('recipe.recipe_id', 'DESC')
            ->paginate($limit, [
                    'recipe.*', 'cat.name'
                ]);
    }

    /**
     * @param array $attribute
     * @return mixed
     */
    public function addRecipe(array $attribute)
    {
        $this->table = 'recipes';
        return $this->add($attribute);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecipe($id)
    {
        $this->table = 'recipes';
        return $this->delete($id);
    }

    /**
     * @param $id
     * @param array $attribute
     * @return mixed
     */
    public function updateRecipe($id, array $attribute)
    {
        $this->table = 'recipes';
        return $this->update($id, $attribute);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getRecipe($id)
    {
        return $this->find($id);
    }

    /**
     * @param $title
     * @return mixed|static
     */
    public function getRecipeFromTitle($title)
    {
        return $this->getConnection('slave')->where('recipe.title', $title)->first();
    }
}