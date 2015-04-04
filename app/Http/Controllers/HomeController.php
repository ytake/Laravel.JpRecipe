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
        // アクセス保存
        $this->dispatchFromArray("App\Commands\AnalysisCommand", ['recipe_id' => $recipeId]);
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
     */
    public function category($categoryId)
    {
        $categories = $this->service->getCategories($categoryId);
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
    public function faq()
    {
        \View::inject('title', config('recipe.title') . "FAQ");
        return view('home.faq.index');
    }
}
