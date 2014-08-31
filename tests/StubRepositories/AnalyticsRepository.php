<?php
namespace App\Tests\StubRepositories;

use App\Repositories\AnalyticsRepositoryInterface;

class AnalyticsRepository implements AnalyticsRepositoryInterface
{

    const SET_PREFIX = "recipe:";

    const SORTED_SET_PREFIX = "sorted_recipes";

    /**
     * @param $recipeId
     * @return mixed|void
     */
    public function setCount($recipeId)
    {
        // return void
    }

    /**
     * @param int $from
     * @param int $to
     * @return array|mixed
     */
    public function getSortedCount($from = 0, $to = 4)
    {
        return [
            (object) ['recipe_id' => 'recipe:1', 'view' => 1],
            (object) ['recipe_id' => 'recipe:2', 'view' => 1],
            (object) ['recipe_id' => 'recipe:3', 'view' => 1],
            (object) ['recipe_id' => 'recipe:4', 'view' => 1],
            (object) ['recipe_id' => 'recipe:5', 'view' => 1],
        ];
    }

    /**
     * Redis cleanup function
     * 不要になったKeyを削除
     * @return void
     */
    public function getDisableKey()
    {
        // return void
    }
}