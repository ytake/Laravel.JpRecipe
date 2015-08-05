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

use App\Services\ConsoleRecipeService;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;

/**
 * Class AddRecipeCommand
 *
 * @package App\Commands
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AddRecipeCommand extends Command
{
    /** @var ConsoleRecipeService */
    protected $recipe;

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
     * @param ConsoleRecipeService $recipe
     */
    public function __construct(ConsoleRecipeService $recipe)
    {
        parent::__construct();
        $this->recipe = $recipe;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $path = config('recipe.document_path');
        $this->recipe->addRecipes(
            $this->recipe->scanRecipeFiles(
                $path . '/' . $this->laravel->getLocale()
            )
        );

    }

    /**
     * @param        $recipeId
     * @param string $string
     */
    protected function addTags($recipeId, $string = '-')
    {
        if ($string != '-' && $string != '') {
            $tags = explode(',', $string);
            foreach ($tags as $tag) {
                try {
                    $tagId = $this->tag->addTag(['tag_name' => trim($tag)]);
                } catch (QueryException $e) {
                    $tag = $this->tag->getTagFromName(trim($tag));
                    $tagId = $tag->tag_id;
                }
                try {
                    $this->recipeTag->addRecipeTag(['tag_id' => $tagId, 'recipe_id' => $recipeId]);
                } catch (QueryException $e) {
                    // no process
                }
            }
        }
    }
}
