<?php
namespace App\Controllers;

/**
 * Class HomeController
 * @package App\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class HomeController extends BaseController
{

    /**
     * top page
     */
    public function getIndex()
    {
        $this->view('index');
    }

    /**
     * view recipe
     * @param null $one
     */
    public function getRecipe($one = null)
    {

    }
}
