<?php
namespace App\Http\Controllers;

use App\Services\FeedService;

/**
 * Class FeedController
 * @package App\Controllers\Api
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class FeedController extends Controller
{

    /** @var FeedService */
    protected $feed;

    /**
     * @param FeedService $feed
     */
    public function __construct(FeedService $feed)
    {
        $this->feed = $feed;
    }

    /**
     * @get("feed/{format?}", as="feed.index")
     * @param string $format
     * @return mixed
     */
    public function getIndex($format = 'atom')
    {
        return $this->feed->getFeed($format);
    }

    /**
     * @Get("sitemap.xml", as="sitemap")
     * @return \Illuminate\Http\Response
     */
    public function getSiteMap()
    {
        return response(
            $this->feed->getSiteMap(),
            200,
            [
                "Content-Type" => "application/xml; charset=UTF-8"
            ]
        );
    }

}
