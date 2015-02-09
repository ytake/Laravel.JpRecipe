<?php
namespace App\Repositories;

/**
 * Interface AnalyticsRepositoryInterface
 * @package App\Repositories
 */
interface AnalyticsRepositoryInterface
{

    /**
     * @param $recipeId
     * @return mixed
     */
    public function setCount($recipeId);

    /**
     * @param int $from
     * @param int $to
     * @return mixed
     */
    public function getSortedCount($from = 0, $to = 4);

    /**
     * @return mixed
     */
    public function getDisableKey();
} 