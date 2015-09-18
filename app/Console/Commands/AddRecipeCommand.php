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

namespace App\Console\Commands;

use App\Services\RecipeService;
use App\Services\ContentService;
use Illuminate\Console\Command;

/**
 * Class AddRecipeCommand
 *
 * @package App\Commands
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AddRecipeCommand extends Command
{
    /** @var RecipeService */
    protected $recipe;

    /** @var ContentService  */
    protected $content;
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'recipe:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "recipes to database";

    /**
     * @param RecipeService  $recipe
     * @param ContentService $content
     */
    public function fire(RecipeService $recipe, ContentService $content)
    {
        $path = config('recipe.document_path');
        $files = $content->scanRecipeFiles($path . '/' . $this->laravel->getLocale());
        $recipe->addRecipes($content->getContent($files));
    }
}
