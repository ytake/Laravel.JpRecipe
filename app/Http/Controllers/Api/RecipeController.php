<?php
namespace App\Http\Controllers\Api;

use Nocarrier\Hal;
use App\Http\Controllers\Controller;
use App\Repositories\RecipeRepositoryInterface;
use App\Repositories\SectionRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;


/**
 * API only
 * Class RecipeController
 * @package App\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 * @Resource("api/v1/recipes", only={"index","show"})
 */
class RecipeController extends Controller
{

    /** @var SectionRepositoryInterface  */
    protected $section;

    /** @var CategoryRepositoryInterface  */
    protected $category;

    /** @var RecipeRepositoryInterface  */
    protected $recipe;

    /** @var Hal */
    protected $hal;

    /**
     * @param SectionRepositoryInterface $section
     * @param CategoryRepositoryInterface $category
     * @param RecipeRepositoryInterface $recipe
     * @param Hal $hal
     */
    public function __construct(
        SectionRepositoryInterface $section,
        CategoryRepositoryInterface $category,
        RecipeRepositoryInterface $recipe,
        Hal $hal
    ) {
        $this->section = $section;
        $this->category = $category;
        $this->recipe = $recipe;
        $this->hal = $hal;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $input = \Input::get('format', 'json');
        $array = [];
        $result = $this->recipe->getRecipesFromCategory();
        if($result) {
            foreach($result as $row) {
                $params = [
                    'id' => $row->recipe_id,
                    'title' => $row->title,
                    'category' => [
                        'name' => $row->name
                    ]
                ];
                $array[] = $params;
                if($input == 'hal') {
                    $this->hal->addLink('recipes', route('home.recipe', ['one' => $row->recipe_id]), $params);
                }
            }
        }
        if($input == 'hal') {
            $this->hal->setUri('self');
            $this->hal->addLink('self', route('home.index'));
            $array = $this->hal;
        }
        return $this->render($array, $input);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $input = \Input::get('format', 'json');
        $array = [];
        $recipe = $this->recipe->getRecipe($id);
        if($recipe) {
            $category = $this->category->getCategory($recipe->category_id);
            $array = [
                'id' => $recipe->recipe_id,
                'title' => $recipe->title,
                'problem' => $recipe->problem,
                'category' => [
                    'description' => $category->description,
                    'name' => $category->name,
                ],
            ];
        }
        // render for hypermedia
        if($input == 'hal') {
            $this->hal->setUri(route('home.recipe', ['one' => $id]));
            $this->hal->setData($array);
            $array = $this->hal;
        }
        return $this->render($array, $input);
    }

    /**
     * @param $array
     * @param string $format
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($array = null, $format = 'json')
    {
        switch($format)
        {
            case "hal":
                return \Response::hal($array);
                break;
            default:
                return \Response::json($array);
                break;
        }
    }
}