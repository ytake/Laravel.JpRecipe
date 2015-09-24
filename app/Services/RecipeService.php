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

namespace App\Services;

use App\Repositories\RecipeRepositoryInterface;
use Ytake\LaravelAspect\Annotation\Transactional;

/**
 * Class RecipeService
 *
 * @package App\Services
 */
class RecipeService
{
    /** @var RecipeRepositoryInterface */
    protected $recipe;

    /**
     * @param RecipeRepositoryInterface $recipe
     */
    public function __construct(RecipeRepositoryInterface $recipe)
    {
        $this->recipe = $recipe;
    }

    /**
     * @Transactional
     * @param array $contents
     */
    public function addRecipes(array $contents)
    {
        foreach ($contents as $content) {
            if ($content['body'] && isset($content['title'])) {
                $exists = $this->recipe->getRecipeFromTitle($content['title']);
                if ($exists) {
                    $this->recipe->updateRecipe($exists->recipe_id, $content);
                }
                if (!$exists) {
                    $this->addRecipe($content);
                }
            }
        }
    }

    /**
     * @param array $content
     * @return mixed
     */
    public function addRecipe(array $content)
    {
        return $this->recipe->addRecipe($content);
    }

    /**
     * @param $title
     * @return mixed
     */
    public function hasRecipe($title)
    {
        return $this->recipe->getRecipeFromTitle($title);
    }

    /**
     * @param int $num
     * @return mixed
     */
    public function getLatestRecipe($num = 5)
    {
        return $this->recipe->getLatestRecipe($num);
    }
}
