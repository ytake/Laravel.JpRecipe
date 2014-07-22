<?php
namespace App\Repositories\Fluent;

use App\Repositories\RecipeRepositoryInterface;

/**
 * Class RecipeRepository
 * @package App\Repositories\Fluent
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class RecipeRepository extends AbstractFluent implements RecipeRepositoryInterface
{

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

}