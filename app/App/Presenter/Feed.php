<?php
namespace App\Presenter;

use Zend\Feed\Writer\Feed AS ZendFeed;

/**
 * Class Feed
 * @package App\Presenter
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Feed implements FeedInterface
{

    /** @var ZendFeed  */
    protected $feed;

    /** @var string */
    protected $format;

    /**
     * @param ZendFeed $feed
     */
    public function __construct(ZendFeed $feed)
    {
        $this->feed = $feed;
    }

    /**
     * @param string $format
     * @return mixed|void
     */
    public function setHeaders($format = 'atom')
    {
        $this->feed->setTitle(\Config::get('recipe.title'));
        $this->feed->setLink(url());
        $this->feed->setFeedLink(route('feed.index', ['format' => $format]), $format);
        $this->feed->setDateModified(time());
        $this->feed->addAuthor([
                'name'  => 'Yuuki Takezawa',
                'email' => 'yuuki.takezawa@comnect.jp.net'
            ]);
        $this->feed->addHub('http://pubsubhubbub.appspot.com/');

        $this->format = $format;
    }

    /**
     * @return mixed|string
     */
    public function render()
    {
        return $this->feed->export($this->format);
    }

} 