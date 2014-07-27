<?php
namespace App\Presenter;

use Illuminate\Support\Facades\Facade;

/**
 * Class MarkdownFacade
 * @package App\Presenter
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class MarkdownFacade extends Facade
{
    /**
     * Get the registered name of the component.
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'markdown';
    }
} 