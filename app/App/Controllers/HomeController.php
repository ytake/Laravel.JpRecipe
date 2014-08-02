<?php
namespace App\Controllers;

use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\RecipeRepositoryInterface;
use App\Repositories\SectionRepositoryInterface;

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

    /**
     * @param SectionRepositoryInterface $section
     * @param CategoryRepositoryInterface $category
     * @param RecipeRepositoryInterface $recipe
     */
    public function __construct(
        SectionRepositoryInterface $section,
        CategoryRepositoryInterface $category,
        RecipeRepositoryInterface $recipe
    ) {
        $this->section = $section;
        $this->category = $category;
        $this->recipe = $recipe;
    }

    /**
     * top page
     */
    public function getIndex()
    {
        $data = [
            'sections' => $this->section->getSections()
        ];
        $this->view('home.index', $data);
    }

    /**
     * view recipe
     * @param null $one
     */
    public function getRecipe($one = null)
    {

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
}
