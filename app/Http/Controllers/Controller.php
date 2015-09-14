<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Class Controller
 *
 * @package App\Http\Controllers
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
abstract class Controller extends BaseController
{
    /**
     * @param null $string
     * @return void
     */
    protected function title($string = null)
    {
        $title = ($string) ? " | $string" : null;
        $title = config('recipe.title') . $title;
        view()->inject('title', e(str_replace(["\r\n", "\r", "\n"], '', $title)));
    }

    /**
     * @param null $string
     * @return void
     */
    protected function description($string = null)
    {
        $description = ($string) ? " | $string" : null;
        $description = config('recipe.description_prefix') . $description . " レシピ";
        view()->inject('description', e(str_replace(["\r\n", "\r", "\n"], '', $description)));
    }
}
