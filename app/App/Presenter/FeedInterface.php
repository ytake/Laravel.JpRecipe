<?php
namespace App\Presenter;

/**
 * Interface FeedInterface
 * @package App\Presenter
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
interface FeedInterface
{

    /**
     * @param string $format
     * @return mixed
     */
    public function setHeaders($format = 'atom');

    /**
     * @return mixed
     */
    public function render();
} 