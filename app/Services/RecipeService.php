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
     * @param array $contents
     */
    public function addRecipes(array $contents)
    {
        foreach ($contents as $content) {
            if ($content['body'] && isset($content['title'])) {
                var_dump($content);
                // $identifier = $this->recipe->addRecipe($entity);
            }
        }
    }

    /**
     * @Transactional("master")
     * @param array $content
     */
    public function addRecipe(array $content)
    {

    }

    public function hasRecipe($title)
    {

    }
}
