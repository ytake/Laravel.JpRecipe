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

use App\Repositories\ContentRepository;
use App\Repositories\FileRepositoryInterface;
use App\Repositories\RecipeRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;

/**
 * Class ConsoleRecipeService
 *
 * @package App\Services
 */
class ConsoleRecipeService
{
    /** @var RecipeRepositoryInterface  */
    protected $recipe;

    /** @var ContentRepository */
    protected $content;

    /** @var FileRepositoryInterface */
    protected $file;

    /** @var CategoryRepositoryInterface */
    protected $category;

    /**
     * @param FileRepositoryInterface     $file
     * @param CategoryRepositoryInterface $category
     * @param ContentRepository           $content
     */
    public function __construct(
        FileRepositoryInterface $file,
        CategoryRepositoryInterface $category,
        ContentRepository $content,
        RecipeRepositoryInterface $recipe
    ) {
        $this->file = $file;
        $this->category = $category;
        $this->content = $content;
        $this->recipe = $recipe;
    }

    /**
     * @param $path
     *
     * @return \Symfony\Component\Finder\SplFileInfo[]
     */
    public function scanRecipeFiles($path)
    {
        return $this->file->scanDirectory($path);
    }

    /**
     * @param array $files
     *
     * @return \App\Entities\Content[]
     */
    public function getContentEntities(array $files)
    {
        $entities = [];
        /** @var \Symfony\Component\Finder\SplFileInfo $file */
        foreach ($files as $file) {
            $category = $this->category->getCategoryBySlug($file->getRelativePath());
            if (count($category)) {
                $recipe = $this->content->parse(
                    $this->file->open($file->getRealPath())
                );
                if ($recipe) {
                    $recipe->categoryIdentifier = $category->category_id;
                    $entities[] = $recipe;
                }
            }
        }
        return $entities;
    }

    /**
     * @param array $files
     */
    public function addRecipes(array $files)
    {
        $entities = $this->getContentEntities($files);
        foreach($entities as $entity) {
            if($entity->getBody() && $entity->getTitle()) {
                $identifier = $this->recipe->addRecipe($entity);
            }
        }
    }
}
