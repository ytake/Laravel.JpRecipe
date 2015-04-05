<?php
namespace App\Services;

use App\Exceptions\RecipeNotFoundException;
use App\Repositories\RecipeRepositoryInterface;
use App\Repositories\SectionRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\RecipeTagRepositoryInterface;
use App\Repositories\AnalyticsRepositoryInterface;

/**
 * Class RecipeService
 * @package App\Services
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class RecipeService
{

    /** @var SectionRepositoryInterface */
    protected $section;

    /** @var CategoryRepositoryInterface */
    protected $category;

    /** @var RecipeRepositoryInterface */
    protected $recipe;

    /** @var RecipeTagRepositoryInterface */
    protected $tag;

    /** @var AnalyticsRepositoryInterface */
    protected $analytics;

    /**
     * @param SectionRepositoryInterface $section
     * @param CategoryRepositoryInterface $category
     * @param RecipeRepositoryInterface $recipe
     * @param RecipeTagRepositoryInterface $tag
     * @param AnalyticsRepositoryInterface $analytics
     */
    public function __construct(
        SectionRepositoryInterface $section,
        CategoryRepositoryInterface $category,
        RecipeRepositoryInterface $recipe,
        RecipeTagRepositoryInterface $tag,
        AnalyticsRepositoryInterface $analytics
    ) {
        $this->section = $section;
        $this->category = $category;
        $this->recipe = $recipe;
        $this->tag = $tag;
        $this->analytics = $analytics;
    }


    /**
     * @access private
     * @return mixed
     */
    public function getContentsRanking()
    {
        $result = $this->analytics->getSortedCount(0, 6);
        if ($result) {
            foreach ($result as $row) {
                $recipe = $this->recipe->getRecipe($row->recipe_id);
                $category = $this->category->getCategory($recipe->category_id);
                $row->category_id = isset($recipe->category_id) ? $recipe->category_id : null;
                $row->title = isset($recipe->title) ? $recipe->title : null;
                $row->name = isset($category->name) ? $category->name : null;
            }
        }
        return $result;
    }

    /**
     * @return \stdClass
     */
    public function getSections()
    {
        $sections = $this->section->getSections();
        foreach ($sections as $section) {
            $section->recipes = $this->recipe->getRecipeFromSectionByRand($section->section_id);
        }
        return $sections;
    }

    /**
     * @param int $latest
     * @return array
     */
    public function getIndexContents($latest = 7)
    {
        return [
            'latest' => $this->recipe->getLatestRecipe($latest),
            'sections' => $this->getSections(),
            'popular' => $this->getContentsRanking()
        ];
    }

    /**
     * @param $recipeId
     * @return array
     * @throws RecipeNotFoundException
     */
    public function getRecipe($recipeId)
    {
        // recipe取得
        $recipe = $this->recipe->getRecipe($recipeId);
        if (!$recipe) {
            throw new RecipeNotFoundException;
        }
        $recipe->category = $this->category->getCategory($recipe->category_id);
        return [
            'recipe' => $recipe,
            'tags' => $this->tag->getRecipeTags($recipe->recipe_id),
            'info' => $this->recipe->getPrevNextRecipes($recipeId)
        ];
    }

    /**
     * @param $categoryId
     * @return array
     */
    public function getCategories($categoryId)
    {
        $category = $this->category->getCategory($categoryId);
        return [
            'category' => $category,
            'list' => $this->recipe->getRecipesFromCategory($categoryId)
        ];
    }

    /**
     * @param $sectionId
     * @return array
     */
    public function getSection($sectionId)
    {
        $section = $this->section->getSection($sectionId);
        return [
            'section' => $section,
            'list' => $this->category->getCategoryFromSection($sectionId)
        ];
    }

}
