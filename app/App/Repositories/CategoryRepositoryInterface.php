<?php
namespace App\Repositories;

/**
 * Interface CategoryRepositoryInterface
 * @package App\Repositories
 */
interface CategoryRepositoryInterface
{

    /**
     *
     * @param array $attribute
     * @return mixed
     */
    public function addCategory(array $attribute);

    /**
     * @return array|static[]
     */
    public function getCategories();

    /**
     * @param $sectionId
     * @return array|static[]
     */
    public function getCategoryFromSection($sectionId);
}