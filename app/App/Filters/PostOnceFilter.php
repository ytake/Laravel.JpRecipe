<?php
namespace App\Filters;

/**
 * Class PostOnceFilter
 * @package App\Filters
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class PostOnceFilter implements FilterInterface
{

    /**
     * filter 実装
     */
    public function filter()
    {
        list($controller, $method) = explode('@', \Route::currentRouteAction());
        $reflectionClass = new \ReflectionClass($controller);
        $constant = $reflectionClass->getConstant('SESSION_KEY');

        if(!\Session::get($constant)) {
            return \Redirect::route($this->redirectForm());
        }
    }

    /**
     * @return mixed
     */
    protected function redirectForm()
    {
        $explode = explode('.', \Route::currentRouteName());
        return str_replace(end($explode), 'form', \Route::currentRouteName());
    }
}