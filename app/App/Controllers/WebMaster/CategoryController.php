<?php
namespace App\Controllers\WebMaster;

use App\Controllers\BaseController;
use App\Repositories\SectionRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;

/**
 * Class CategoryController
 * @package App\Controllers\WebMaster
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class CategoryController extends BaseController
{

    // constants
    const PER_PAGE = 10;

    // add recipes
    const SESSION_KEY = 'session_category';

    /** @var string  */
    protected $layout = 'layouts.webmaster';

    /** @var CategoryRepositoryInterface */
    protected $category;

    /** @var SectionRepositoryInterface */
    protected $section;

    /**
     * @param CategoryRepositoryInterface $category
     * @param SectionRepositoryInterface $section
     */
    public function __construct(CategoryRepositoryInterface $category, SectionRepositoryInterface $section)
    {
        $this->category = $category;
        $this->section = $section;
    }

    /**
     * レシピ詳細
     * @param null $one
     */
    public function getShow($one = null)
    {
        $category = $this->category->getCategory($one);
        $data = [
            'category' => $category
        ];
        $this->view('webmaster.category.show', $data);
    }

    /**
     * カテゴリー一覧
     */
    public function getList()
    {
        $data = [
            'list' => $this->category->getCategories(),
            'sections' => ['' => 'すべて'] + $this->section->getSectionList('name', 'section_id')
        ];
        $this->view('webmaster.category.list', $data);
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
            'sections' => $this->section->getSectionList('name', 'section_id')
        ];
        if($one) {
            $data['category'] = $this->category->getCategory($one);
        }
        $this->view('webmaster.category.form', $data);
    }

    /**
     * 確認
     * @param null $one
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function postConfirm($one = null)
    {
        $request = \Input::only(['section_id', 'name', 'description']);
        // validator
        if($one) {
            $this->category->rule['webmaster.category']['name'] = "required|regex:/^[a-zA-Z]+$/|unique:categories,name,{$one},category_id";
        }
        $validate = $this->category->validate($request, 'webmaster.category');
        if(!$validate) {
            return \Redirect::route('webmaster.category.form', ['one' => $one])
                ->withErrors($this->category->getErrors())->withInput();
        }

        $data = [
            'id' => $one,
            'hidden' => $this->setHiddenVars($request),
            'sections' => $this->section->getSectionList('name', 'section_id')
        ];
        $this->view('webmaster.category.confirm', $data);
    }

    /**
     * 実行
     * @param null $one
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postApply($one = null)
    {
        if(\Input::get('_return')) {
            return \Redirect::route('webmaster.category.form', ['id' => $one])->withInput();
        }
        $request = \Input::only(['section_id', 'name', 'description']);

        try {
            // added
            if(is_null($one)) {
                $this->category->addCategory($request);
            // updated
            }else{
                $this->category->updateCategory($one, $request);
            }
            // session remove
            \Session::forget(self::SESSION_KEY);
            $this->view('webmaster.category.apply', ['id' => $one]);
        } catch(\Illuminate\Database\QueryException $e) {

            return \Redirect::route('webmaster.category.form', ['one' => $one])
                ->withErrors(['name' => 'そのカテゴリーはすでに使用されています'])->withInput();
        }
    }
}