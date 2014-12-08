<?php
namespace App\Composers;

use App\Feed\ReaderInterface;

/**
 * Class NewsFeederComposer
 * @package App\Composers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class NewsFeederComposer
{

    /** @var ReaderInterface */
    protected $reader;

    /**
     * @param ReaderInterface $reader
     */
    public function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    /**
     * @param $view
     * @return void
     */
    public function compose($view)
    {
        $url = \Config::get('recipe.news_feed');
        if(\Cache::has("news_feed:{$url}")) {
            $view->with('news_feeder', \Cache::get("news_feed:{$url}"));
            return;
        }
        $data = $this->reader->read($url);
        \Cache::put("news_feed:{$url}", $data, 720);
        $view->with('news_feeder', $data);
    }

} 