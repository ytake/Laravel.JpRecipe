<?php
namespace App\Repositories;

/**
 * Interface RecipeRepositoryInterface
 * @package App\Repositories
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
interface RecipeRepositoryInterface
{

    /**
     * @param int $limit
     * @return \Illuminate\Pagination\Paginator
     */
    public function getRecipes($limit = 25);
}