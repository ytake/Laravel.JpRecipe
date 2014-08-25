<?php
namespace App\Tests\StubRepositories;

use Mockery as m;
use App\Repositories\RecipeRepositoryInterface;
use App\Validator\CustomRule;

class RecipeRepository implements RecipeRepositoryInterface
{
    use CustomRule;

    public $array = [
        [
            "recipe_id" => 1,
            "title" => "Speeding up Development with Generators",
            "category_id" => 23,
            "problem" => "You'd like to speed up your development workflow by using generators.",
            "solution" => 'testing',
            "discussion" => "testing",
            "position" => 1,
            'created_at' => "1970-00-00 00:00:00",
            'updated_at' => "1970-00-00 00:00:00",
            "name" => "testing"
        ],
    ];

    public function tearDown()
    {
        m::close();
    }

    /**
     * セクション内でランダムにレシピを取得
     * @param $sectionId
     * @param int $limit
     * @return array
     */
    public function getRecipeFromSectionByRand($sectionId, $limit = 3)
    {
        // TODO: Implement getRecipeFromSectionByRand() method.
    }

    /**
     * @param int $limit
     * @return mixed
     */public function getLatestRecipe($limit = 5)
    {
        // TODO: Implement getLatestRecipe() method.
    }

    /**
     * @param int $limit
     * @param int $categoryId
     * @return \Illuminate\Pagination\Paginator
     */
    public function getRecipesPage($limit = 25, $categoryId = null)
    {
        // TODO: Implement getRecipesPage() method.
    }

    /**
     * @param array $attribute
     * @return mixed
     */
    public function addRecipe(array $attribute)
    {
        // TODO: Implement addRecipe() method.
    }

    /**
     * @param $id
     * @param array $attribute
     * @return mixed
     */
    public function updateRecipe($id, array $attribute)
    {
        // TODO: Implement updateRecipe() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecipe($id)
    {
        // TODO: Implement deleteRecipe() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getRecipe($id)
    {
        // TODO: Implement getRecipe() method.
    }

    /**
     * @param $title
     * @return mixed
     */
    public function getRecipeFromTitle($title)
    {
        // TODO: Implement getRecipeFromTitle() method.
        foreach($this->array as $array) {
            if($array['title'] == $title) {
                return (object) $array;
            }
        }
        return [];
    }

    /**
     * @param int $categoryId
     */
    public function getRecipesFromCategory($categoryId = null)
    {
        $result = [];
        // TODO: Implement getRecipesFromCategory() method.
        foreach($this->array as $array) {
            $result[] = (object)$array;
        }
        return $result;
    }

    public function all()
    {
        $result = [];
        // TODO: Implement getRecipesFromCategory() method.
        foreach($this->array as $array) {
            $result[] = (object)$array;
        }
        return $result;
    }

    /**
     * @param array $text
     * @param int $current
     * @param int $limit
     * @return mixed
     */
    public function getRecipesFromText(array $text, $current = 1, $limit = 25)
    {
        // TODO: Implement getRecipesFromText() method.
        $result = [];
        // TODO: Implement getRecipesFromCategory() method.
        foreach($this->array as $array) {
            $result[] = (object)$array;
        }
        return $result;
    }

}