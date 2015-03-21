<?php
namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Repositories\RecipeRepositoryInterface;

/**
 * 検索コントローラー
 * Class SearchController
 * @package App\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class SearchController extends Controller
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
     * @Get("search", as="search.index")
     * @param SearchRequest $request
     * @return \Illuminate\View\View
     */
    public function getIndex(SearchRequest $request)
    {
        $words = preg_split("[　 ,]", $request->words);
        $data = [
            'list' => $this->recipe->getRecipesFromText($words, $request->get('page', 1), self::PER_PAGE)
        ];
        $this->title("検索: " . implode(',', $words));
        return view('home.search.index', $data);
    }
}
