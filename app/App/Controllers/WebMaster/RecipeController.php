<?php
namespace App\Controllers\WebMaster;

use App\Controllers\BaseController;
use App\Repositories\RecipeRepositoryInterface;

/**
 * Class RecipeController
 * @package App\Controllers\WebMaster
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class RecipeController extends BaseController
{

    /** @var string  */
    protected $layout = 'layouts.webmaster';

    /** @var RecipeRepositoryInterface  */
    protected $recipe;

    /**
     * @param RecipeRepositoryInterface $recipe
     */
    public function __construct(RecipeRepositoryInterface $recipe)
    {
        $this->recipe = $recipe;
    }


    public function getShow($one = null)
    {

    }

    /**
     * レシピ一覧
     */
    public function getList()
    {
        $data = [
            'list' => $this->recipe->getRecipes()
        ];
        $this->view('webmaster.recipe.list', $data);
    }


    public function getForm($one = null)
    {
        $data = [

        ];
        $this->view('webmaster.recipe.form', $data);
    }

    public function postConfirm($one = null)
    {

    }

    public function postApply()
    {

    }
}
