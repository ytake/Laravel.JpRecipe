<?php
namespace App\Controllers\Api;

use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\RecipeRepositoryInterface;
use App\Repositories\SectionRepositoryInterface;
use Illuminate\Routing\Controller;

/**
 * API only
 * Class RecipeController
 * @package App\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class RecipeController extends Controller
{

    /** @var SectionRepositoryInterface  */
    protected $section;

    /** @var CategoryRepositoryInterface  */
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


    public function index()
    {
        $array = [];
        $sections = $this->section->getSections();
        $i = 0;
        foreach($sections as $section) {
            $array[$i] = [
                'sections' => [
                    'name' => $section->name,
                ]
            ];
            $categories = $this->category->getCategoryFromSection($section->section_id);
            foreach($categories as $category) {
                $result = $this->recipe->getRecipesFromCategory($category->category_id);
                $array[$i]['sections']['categories'][] = [
                    'description' => $category->description,
                    'data' => array_map(function($data) {
                            return [
                                'id' => $data->recipe_id,
                                'title' => $data->title
                            ];
                        }, $result)
                ];
            }
            $i++;
        }
        return \Response::json($array);
    }

    public function show($id)
    {

    }

    /**
     * @param array $array
     * @param string $format
     * @return \Illuminate\Http\JsonResponse
     */
    public function render(array $array, $format = 'json')
    {

    }
}