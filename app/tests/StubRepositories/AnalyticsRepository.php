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
            [
                'recipe:1', 1
            ],
            [
                'recipe:2', 1
            ],
            [
                'recipe:3', 1
            ],
            [
                'recipe:4', 1
            ],
            [
                'recipe:5', 1
            ],
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