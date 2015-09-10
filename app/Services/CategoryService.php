<?php

namespace App\Services;

use App\Repositories\CategoryRepositoryInterface;

class CategoryService
{
    /** @var CategoryRepositoryInterface */
    protected $category;

    /**
     * @param CategoryRepositoryInterface $category
     */
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }


    // $this->category->getCategoryBySlug($file->getRelativePath());
}
