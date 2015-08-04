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

namespace App\Repositories;

/**
 * Interface RecipeTagRepositoryInterface
 *
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
