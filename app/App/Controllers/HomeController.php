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
     *
     */
    public function getIndex()
    {
        $this->view('index');
    }

}
