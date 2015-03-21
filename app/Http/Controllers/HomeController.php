<?php
namespace App\Http\Controllers;

use App\Services\RecipeService;

/**
 * Class HomeController
 * @package App\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class HomeController extends Controller
{

    /** @var RecipeService  */
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
    public function getIndex()
    {
        $data = [
            'latest' => $this->service->getRecipeRepository()->getLatestRecipe(7),
            'sections' => $this->service->getSections(),
            'popular' => $this->service->getContentsRanking()
        ];
        return view('home.index', $data);
    }

    /**
     * @Get("recipe/{recipeId}", as="home.recipe")
     * @param null $recipeId
     * @return \Illuminate\View\View
     */
    public function getRecipe($recipeId = null)
    {
        // アクセス保存
        $this->dispatchFromArray("App\Commands\AnalysisCommand", ['recipe_id' => $recipeId]);

        // recipe取得
        $recipe = $this->service->getRecipeRepository()->getRecipe($recipeId);
        $recipe->category = $this->service->getCategoryRepository()->getCategory($recipe->category_id);
        $data = [
            'recipe' => $recipe,
            'tags' => $this->service->getTagRepository()->getRecipeTags($recipe->recipe_id),
            'info' => $this->service->getRecipeRepository()->getPrevNextRecipes($recipeId)
        ];
        // title設定
        $this->title($recipe->title);
        $this->description($recipe->problem);
        return view('home.recipe.index', $data);
    }

    /**
     * @Get("category/{categoryId}",as="home.category")
     * @param $categoryId
     * @return \Illuminate\View\View
     */
    public function getCategory($categoryId)
    {
        $category = $this->service->getCategoryRepository()->getCategory($categoryId);
        $data = [
            'category' => $category,
            'list' => $this->service->getRecipeRepository()->getRecipesFromCategory($categoryId)
        ];
        $this->title($category->description);
        $this->description($category->description);
        return view('home.category.index', $data);
    }

    /**
     * @Get("section/{sectionId}", as="home.section")
     * @param $sectionId
     * @return \Illuminate\View\View
     */
    public function getSection($sectionId)
    {
        $section = $this->service->getSectionRepository()->getSection($sectionId);
        $data = [
            'section' => $section,
            'list' => $this->service->getCategoryRepository()->getCategoryFromSection($sectionId)
        ];
        // title設定
        $this->title($section->name);
        return view('home.section.index', $data);
    }

    /**
     * @get("faq", as="faq.index")
     * @return \Illuminate\View\View
     */
    public function getFaq()
    {
        \View::inject('title', config('recipe.title') . "FAQ");
        return view('home.faq.index');
    }
}
