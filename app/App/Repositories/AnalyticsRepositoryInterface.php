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
     * @return mixed
     */
    public function getSortedCount();
} 