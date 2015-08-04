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

use App\Repositories\RecipeTagRepositoryInterface;

/**
 * Class RecipeTagRepository
 *
 * @package App\Repositories\Fluent
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class RecipeTagRepository implements RecipeTagRepositoryInterface
{

    /** @var string */
    protected $table = 'recipe_tags';

    /**
     * @param     $recipeId
     * @param int $lifeTime
     * @return mixed|static
     */
    public function getRecipeTags($recipeId, $lifeTime = 240)
    {
        $key = "recipe_tag:{$recipeId}";
        if (\Cache::has($key)) {
            return \Cache::get($key);
        }
        $result = \DB::connection('slave')->table($this->table)
            ->join('tags', 'tags.tag_id', '=', "{$this->table}.tag_id")
            ->where("{$this->table}.recipe_id", $recipeId)
            ->get(['tags.*']);
        if ($result) {
            \Cache::put($key, $result, $lifeTime);
        }

        return $result;
    }

    /**
     * @param $recipeId
     * @return mixed
     */
    public function deleteRecipeTags($recipeId)
    {
        \Cache::forget("recipe_tag:{$recipeId}");

        return \DB::connection('master')->table($this->table)
            ->where("recipe_id", $recipeId)
            ->delete();
    }

    /**
     * @param array $attribute
     * @return int|mixed
     */
    public function addRecipeTag(array $attribute)
    {
        return \DB::connection('master')->table($this->table)->insert($attribute);
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
