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
     * @param int $categoryId
     * @return \Illuminate\Pagination\Paginator
     */
    public function getRecipesPage($limit = 25, $categoryId = null);

    /**
     * @param array $attribute
     * @return mixed
     */
    public function addRecipe(array $attribute);

    /**
     * @param $id
     * @param array $attribute
     * @return mixed
     */
    public function updateRecipe($id, array $attribute);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecipe($id);

    /**
     * @param $id
     * @return mixed
     */
    public function getRecipe($id);

    /**
     * @param $title
     * @return mixed
     */
    public function getRecipeFromTitle($title);


    /**
     * @param int $categoryId
     */
    public function getRecipesFromCategory($categoryId = null);
}