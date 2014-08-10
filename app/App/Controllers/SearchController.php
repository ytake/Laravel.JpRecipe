<?php
namespace App\Controllers;

use App\Repositories\RecipeRepositoryInterface;

/**
 * 検索コントローラー
 * Class SearchController
 * @package App\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class SearchController extends BaseController
{

    // constants
    const PER_PAGE = 25;

    /** @var RecipeRepositoryInterface  */
    protected $recipe;

    /**
     * @param RecipeRepositoryInterface $recipe
     */
    public function __construct(RecipeRepositoryInterface $recipe)
    {
        $this->recipe = $recipe;
    }

    /**
     *
     */
    public function getIndex()
    {
        $requests = \Input::only(['words']);
        $validate = $this->recipe->validate($requests, 'search');

        if(!$validate) {
            return \Redirect::to('/')->withErrors(['words' => '検索キーワードはかならず記入して下さい']);
        }
        $words = preg_split("[　 ,]", $requests['words']);
        /** @var array $data */
        $data = [
            'list' => $this->recipe->getRecipesFromText($words, \Input::get('page', 1), self::PER_PAGE)
        ];
        $this->view('home.search.index', $data);
    }
}
