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
     * @return \Illuminate\Http\Response|mixed
     */
    public function render();

    /**
     * @return \Zend\Feed\Writer\Feed
     */
    public function getFeeder();

}
