<?php
namespace App\Controllers;

use App\Presenter\FeedInterface;
use Illuminate\Routing\Controller;

/**
 * Class FeedController
 * @package App\Controllers\Api
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class FeedController extends Controller
{

    /** @var FeedInterface */
    protected $feed;

    /**
     * @param FeedInterface $feed
     */
    public function __construct(FeedInterface $feed)
    {
        $this->feed = $feed;
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function getIndex($format = 'atom')
    {
        $this->feed->setHeaders($format);
        return $this->feed->render();
    }
}