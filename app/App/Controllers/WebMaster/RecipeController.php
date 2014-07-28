<?php
namespace App\Controllers\WebMaster;

use App\Controllers\BaseController;
use App\Repositories\RecipeRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;

/**
 * Class RecipeController
 * @package App\Controllers\WebMaster
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class RecipeController extends BaseController
{

    // constants
    const PER_PAGE = 10;

    // add recipes
    const SESSION_KEY = 'add_recipe';

    /** @var string  */
    protected $layout = 'layouts.webmaster';

    /** @var RecipeRepositoryInterface  */
    protected $recipe;

    /** @var CategoryRepositoryInterface */
    protected $category;

    /**
     * @param RecipeRepositoryInterface $recipe
     * @param CategoryRepositoryInterface $category
     */
    public function __construct(RecipeRepositoryInterface $recipe, CategoryRepositoryInterface $category)
    {
        $this->recipe = $recipe;
        $this->category = $category;
    }

    /**
     * レシピ詳細
     * @param null $one
     */
    public function getShow($one = null)
    {
        $recipe = $this->recipe->getRecipe($one);
        $category = $this->category->getCategory($recipe->category_id);
        $data = [
            'recipe' => $recipe,
            'category' => $category
        ];
        $this->view('webmaster.recipe.show', $data);
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

    /**
     * 登録フォーム
     * @param null $one
     */
    public function getForm($one = null)
    {
        \Session::put(self::SESSION_KEY, \Session::token());
        $data = [
            'id' => $one,
            'categories' => $this->category->getCategoryList('description', 'category_id')
        ];
        if($one) {
            $data['recipe'] = $this->recipe->getRecipe($one);
        }
        $this->view('webmaster.recipe.form', $data);
    }

    /**
     * 確認
     * @param null $one
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function postConfirm($one = null)
    {
        $request = \Input::only([
                'title', 'category_id', 'problem', 'solution', 'discussion'
            ]);
        // validator
        if($one) {
            $this->recipe->rule['webmaster.rule']['title'] = "required|unique:recipes,title,{$one},recipe_id";
        }
        $validate = $this->recipe->validate($request, 'webmaster.rule');
        if(!$validate) {
            return \Redirect::route('webmaster.recipe.form', ['one' => $one])
                ->withErrors($this->recipe->getErrors())->withInput();
        }

        $data = [
            'id' => $one,
            'hidden' => $this->setHiddenVars($request),
            'categories' => $this->category->getCategoryList('description', 'category_id')
        ];
        $this->view('webmaster.recipe.confirm', $data);
    }

    /**
     * 実行
     * @param null $one
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postApply($one = null)
    {
        if(\Input::get('_return')) {
            return \Redirect::route('webmaster.recipe.form', ['id' => $one])->withInput();
        }
        $request = \Input::only([
                'title', 'category_id', 'problem', 'solution', 'discussion'
            ]);

        try {
            // added
            if(is_null($one)) {
                $this->recipe->addRecipe($request);
            // updated
            }else{
                $this->recipe->updateRecipe($one, $request);
            }
            // session remove
            \Session::forget(self::SESSION_KEY);
            $this->view('webmaster.recipe.apply');
        } catch(\Illuminate\Database\QueryException $e) {

            return \Redirect::route('webmaster.recipe.form', ['one' => $one])
                ->withErrors(['title' => 'そのタイトルはすでに登録されています'])->withInput();
        }
    }


    /**
     * @access private
     * @param array $array
     * @return array
     */
    private function setHiddenVars(array $array)
    {
        $attributes = [];
        foreach($array as $key => $value) {
            $attributes[] = \Form::hidden($key, $value);
        }
        return implode("\n", $attributes);
    }

}