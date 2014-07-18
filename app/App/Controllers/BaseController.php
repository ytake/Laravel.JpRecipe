<?php
namespace App\Controllers;

use Illuminate\Routing\Controller;

/**
 * Class BaseController
 * @package App\Controllers
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class BaseController extends Controller
{

    protected $layout = 'layouts.default';

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = \View::make($this->layout);
        }
    }

    /**
     * view 描画
     * @param string $path
     * @param array $data
     * @return void
     */
    protected function view($path, $data = [])
    {
        $this->layout->content = \View::make($path, $data);
    }
}