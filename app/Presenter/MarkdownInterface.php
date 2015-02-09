<?php
namespace App\Presenter;

/**
 * Interface MarkdownInterface
 * @package App\Presenter
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
interface MarkdownInterface
{

    /**
     *
     * @param $text
     * @param null $cacheKey
     * @param int $life cache life time
     * @return mixed|string
     */
    public function render($text, $cacheKey = null, $life = 360);
} 