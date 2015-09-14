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

namespace App\Http\Controllers;

use App\Services\RecipeService;

/**
 * Class HomeController
 *
 * @package App\Controllers
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class HomeController extends Controller
{
    /** @var RecipeService */
    protected $service;

    /**
     * @param RecipeService $service
     */
    public function __construct(RecipeService $service)
    {
        $this->service = $service;
    }

    /**
     * @Get(as="home.index")
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = $this->service->getIndexContents();

        return view('home.index', $data);
    }

    /**
     * @Get("recipe/{recipeId}", as="home.recipe")
     * @param null $recipeId
     * @return \Illuminate\View\View
     */
    public function recipe($recipeId = null)
    {
        // recipe取得
        $recipe = $this->service->getRecipe($recipeId);
        // title設定
        $this->title($recipe['recipe']->title);
        $this->description($recipe['recipe']->problem);

        return view('home.recipe.index', $recipe);
    }

    /**
     * @Get("category/{categoryId}",as="home.category")
     * @param $categoryId
     * @return \Illuminate\View\View
     * @throws \App\Exceptions\RecipeNotFoundException
     */
    public function category($categoryId)
    {
        try {
            $categories = $this->service->getCategories($categoryId);
        } catch (\App\Exceptions\RecipeNotFoundException $e) {
            throw $e;
        }
        $this->title($categories['category']->description);
        $this->description($categories['category']->description);

        return view('home.category.index', $categories);
    }

    /**
     * @Get("section/{sectionId}", as="home.section")
     * @param $sectionId
     * @return \Illuminate\View\View
     */
    public function section($sectionId)
    {
        $section = $this->service->getSection($sectionId);
        // title設定
        $this->title($section['section']->name);

        return view('home.section.index', $section);
    }
}
