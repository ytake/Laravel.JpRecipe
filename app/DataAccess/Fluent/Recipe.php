<?php
/**
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace App\DataAccess\Fluent;

use App\Presenter\MaterializePresenter;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class RecipeRepository
 *
 * @package App\Repositories\Fluent
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Recipe extends AbstractFluent
{
    /** @var string */
    protected $table = 'recipes';

    /** @var */
    protected $primary = 'recipe_id';

    /**
     * @param int $limit
     * @param     $categoryId
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function getRecipesPage($limit = 25, $categoryId = null)
    {
        $query = $this->getConnection('slave')
            ->join('categories AS cat', 'cat.category_id', '=', 'recipe.category_id');

        if (!is_null($categoryId)) {
            $query->where('cat.category_id', $categoryId);
        }

        return $query->orderBy('recipe.recipe_id', 'DESC')
            ->paginate($limit, ['recipe.*', 'cat.name']);
    }

    /**
     * @param string $categoryId
     *
     * @return array|static[]
     */
    public function getRecipesFromCategory($categoryId = null)
    {
        $query = $this->getConnection('slave')
            ->join('categories AS cat', 'cat.category_id', '=', 'recipe.category_id');
        if (!is_null($categoryId)) {
            $query->where('cat.category_id', $categoryId);
        }

        return $query->orderBy('recipe.position', 'ASC')
            ->get(['recipe.recipe_id', 'recipe.title', 'cat.name']);
    }

    /**
     * @param $title
     *
     * @return mixed|static
     */
    public function getRecipeFromTitle($title)
    {
        return $this->getConnection('slave')->where('title', $title)->first();
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
        return $this->getConnection('slave')
            ->join('categories AS cat', 'cat.category_id', '=', 'recipe.category_id')
            ->where('cat.section_id', $sectionId)
            ->orderByRaw('RAND()')->take($limit)
            ->get([
                "cat.description",
                "cat.name",
                "recipe.title",
                "recipe.recipe_id",
                "cat.category_id"
            ]);
    }


    /**
     * 最新レシピの取得
     *
     * @param int $limit
     *
     * @return mixed|void
     */
    public function getLatestRecipe($limit = 5)
    {
        return $this->getConnection('slave')
            ->join('categories AS cat', 'cat.category_id', '=', 'recipes.category_id')
            ->orderBy('recipes.recipe_id', 'DESC')->take($limit)
            ->get([
                "recipes.*",
                "cat.name",
                "cat.description"
            ]);
    }

    /**
     * キーワード検索
     *
     * @param array $text
     * @param int   $current
     * @param int   $limit
     *
     * @return array|\Illuminate\Pagination\Paginator|mixed
     */
    public function getRecipesFromText(array $text, $current = 1, $limit = 25)
    {
        $params = [];
        $wheres = [];
        $selectCount = "SELECT COUNT(recipe.recipe_id) AS count";
        $select = "SELECT recipe.title, recipe.recipe_id, category.category_id, category.name, category.description";

        $commonQuery = " FROM recipes AS recipe"
            . " INNER JOIN categories AS category ON category.category_id = recipe.category_id";
        if ($text) {
            foreach ($text as $row) {
                $wheres[] = "CONCAT(\" \", recipe.title, recipe.problem, recipe.solution, recipe.discussion) LIKE ?";
                $params[] = "%{$row}%";
            }
            $commonQuery .= " WHERE (" . implode(" OR ", $wheres) . ")";
        }
        //
        $count = \DB::connection('slave')->selectOne($selectCount . $commonQuery, $params);
        //
        $selectQuery = " GROUP BY recipe.recipe_id ORDER BY recipe_id ASC LIMIT ?, ?";
        $params[] = ($current - 1) * $limit;
        $params[] = $limit;
        $result = \DB::connection('slave')->select($select . $commonQuery . $selectQuery, $params);
        if ($count) {
            $paginator = new LengthAwarePaginator($result, $count->count, $limit);
            $paginator->presenter(function ($pager) {
                return new MaterializePresenter($pager);
            });

            return $paginator;
        }

        return $result;
    }

    /**
     * @param $recipeId
     *
     * @return \stdClass
     */
    public function getPrevNextRecipes($recipeId)
    {
        $object = new \stdClass();
        $object->next = $this->getConnection('slave')
            ->where('recipe_id', '>', $recipeId)
            ->orderBy('recipe_id', 'ASC')->take(1)->first(['recipe_id', 'title']);
        $object->prev = $this->getConnection('slave')
            ->where('recipe_id', '<', $recipeId)
            ->orderBy('recipe_id', 'DESC')->take(1)->first(['recipe_id', 'title']);

        return $object;
    }
}
