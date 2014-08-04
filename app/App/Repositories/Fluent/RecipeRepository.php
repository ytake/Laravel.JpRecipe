<?php
namespace App\Repositories\Fluent;

use App\Validator\CustomRule;
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
     * @param $categoryId
     * @return \Illuminate\Pagination\Paginator
     */
    public function getRecipesPage($limit = 25, $categoryId = null)
    {
        $query = $this->getConnection('slave')
            ->join('categories AS cat', 'cat.category_id', '=', 'recipe.category_id');

        if(!is_null($categoryId)) {
            $query->where('cat.category_id', $categoryId);
        }
        return $query->orderBy('recipe.recipe_id', 'DESC')
            ->paginate($limit, ['recipe.*', 'cat.name']);
        return $query->get(['recipe.*', 'cat.name']);
    }

    /**
     * @param string $categoryId
     * @return array|static[]
     */
    public function getRecipesFromCategory($categoryId = null)
    {
        $query = $this->getConnection('slave')
            ->join('categories AS cat', 'cat.category_id', '=', 'recipe.category_id');
        if(!is_null($categoryId)) {
            $query->where('cat.category_id', $categoryId);
        }
        return $query->orderBy('recipe.recipe_id', 'DESC')
            ->remember(240, "recipe:category:{$categoryId}")->get(['recipe.*', 'cat.name']);
    }

    /**
     * @param array $attribute
     * @return mixed
     */
    public function addRecipe(array $attribute)
    {
        $this->table = 'recipes';

        if(!isset($attribute['position'])) {
            $position = $this->getRecipePosition($attribute['category_id']);
            $attribute['position'] = (int)$position + 1;
        }
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
        \Cache::forget("recipe:category:{$attribute['category_id']}");
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

    /**
     * @param $categoryId
     * @return mixed
     */
    private function getRecipePosition($categoryId)
    {
        return $this->getConnection('slave')
            ->where('category_id', $categoryId)->max('position');
    }


    /**
     * セクション内でランダムにレシピを取得
     * @param $sectionId
     * @param int $limit
     * @return array
     */
    public function getRecipeFromSectionByRand($sectionId, $limit = 3)
    {
        if(\Cache::has("rand_recipe:{$sectionId}")) {
            return \Cache::get("rand_recipe:{$sectionId}");
        }
        $sql = "SELECT cat.description, cat.name, recipe.title, recipe.recipe_id, cat.category_id"
            . " FROM categories AS cat"
            . " INNER JOIN recipes AS recipe ON cat.category_id = recipe.category_id"
            . " WHERE cat.section_id = ?"
            . " ORDER BY RAND() LIMIT ?";
        $params = [
            $sectionId, $limit
        ];
        $result = \DB::connection('slave')->select($sql, $params);
        if($result) {
            \Cache::add("rand_recipe:{$sectionId}", $result, 10);
        }
        return $result;
    }


    /**
     * 最新レシピの取得
     * @param int $limit
     * @return mixed|void
     */
    public function getLatestRecipe($limit = 5)
    {
        return $this->getConnection('slave')
            ->join('categories AS cat', 'cat.category_id', '=', 'recipe.category_id')
            ->orderBy('recipe.recipe_id', 'DESC')->take($limit)
            ->remember(240, "latest_recipe:" . date("YmdH"))
            ->get([
                    "recipe.*", "cat.name"
                ]);
    }
}