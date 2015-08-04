<?php
namespace App\Composers;

use Illuminate\View\View;
use App\Repositories\CategoryRepositoryInterface;

/**
 * Class CategoryComposer
 *
 * @package App\Composers
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class CategoryComposer
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

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->category->getNavigationCategory());
    }
}
