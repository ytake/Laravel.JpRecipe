<?php
namespace App\Controllers;

use App\Repositories\RecipeRepositoryInterface;
use App\Repositories\SectionRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\AnalyticsRepositoryInterface;

/**
 * Class HomeController
 * @package App\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class HomeController extends BaseController
{

    /** @var SectionRepositoryInterface */
    protected $section;

    /** @var CategoryRepositoryInterface */
    protected $category;

    /** @var RecipeRepositoryInterface  */
    protected $recipe;

    /** @var AnalyticsRepositoryInterface  */
    protected $analytics;

    /**
     * @param SectionRepositoryInterface $section
     * @param CategoryRepositoryInterface $category
     * @param RecipeRepositoryInterface $recipe
     * @param AnalyticsRepositoryInterface $analytics
     */
    public function __construct(
        SectionRepositoryInterface $section,
        CategoryRepositoryInterface $category,
        RecipeRepositoryInterface $recipe,
        AnalyticsRepositoryInterface $analytics
    ) {
        $this->section = $section;
        $this->category = $category;
        $this->recipe = $recipe;
        $this->analytics = $analytics;
    }

    /**
     * top page
     */
    public function getIndex()
    {
        $sections = $this->section->getSections();
        foreach($sections as $section) {
            $section->recipes = $this->recipe->getRecipeFromSectionByRand($section->section_id);
        }
        $data = [
            'latest' => $this->recipe->getLatestRecipe(7),
            'sections' => $sections,
            'popular' => $this->getContentsRanking()
        ];
        $this->view('home.index', $data);
    }

    /**
     * view recipe
     * @param null $one
     */
    public function getRecipe($one = null)
    {
        // アクセス保存
        $this->analytics->setCount($one);
        // recipe取得
        $recipe = $this->recipe->getRecipe($one);
        $recipe->category = $this->category->getCategory($recipe->category_id);
        $data = [
            'recipe' => $recipe,
        ];
        // title設定
        $this->title($recipe->title);
        $this->view('home.recipe.index', $data);
    }

    /**
     * @param $one
     */
    public function getCategory($one)
    {
        $data = [
            'category' => $this->category->getCategory($one),
            'list' => $this->recipe->getRecipesFromCategory($one)
        ];
        $this->view('home.category.index', $data);
    }

    /**
     * @param $one
     */
    public function getSection($one)
    {
        $section = $this->section->getSection($one);
        $data = [
            'section' => $section,
            'list' => $this->category->getCategoryFromSection($one)
        ];
        // title設定
        $this->title($section->name);
        $this->view('home.section.index', $data);
    }

    /**
     * @access private
     * @return mixed
     */
    private function getContentsRanking()
    {
        $result = $this->analytics->getSortedCount(0, 6);
        if($result) {
            foreach ($result as $row) {
                $recipe = $this->recipe->getRecipe($row->recipe_id);
                $category = $this->category->getCategory($recipe->category_id);
                $row->category_id = $recipe->category_id;
                $row->title = $recipe->title;
                $row->name = $category->name;
            }
        }
        return $result;
    }
}
