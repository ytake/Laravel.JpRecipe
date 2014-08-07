<?php
namespace App\Tests\Presenter;

use App\Presenter\Feed;
use App\Tests\TestCase;
use Zend\Feed\Writer\Feed AS ZendFeed;

class FeedTest extends TestCase
{
    /** @var Feed  */
    protected $feed;

    public function setUp()
    {
        parent::setUp();
        $this->feed = new Feed(new ZendFeed);
    }

    public function testFeeder()
    {
        $this->assertInstanceOf("Zend\Feed\Writer\Feed", $this->feed->getFeeder());
    }

    /**
     * @expectedException \Zend\Feed\Writer\Exception\InvalidArgumentException
     */
    public function testHeader()
    {
        $this->feed->setHeaders('atom');
        $feed = $this->feed->getFeeder();
        $links = $feed->getFeedLinks();
        $this->assertArrayHasKey('atom', $links);
        $this->assertSame('http://localhost/feed/atom', $links['atom']);
        $this->feed->setHeaders('rss');
        $feed = $this->feed->getFeeder();
        $links = $feed->getFeedLinks();
        $this->assertArrayHasKey('rss', $links);
        $this->assertSame('http://localhost/feed/rss', $links['rss']);
        $this->feed->setHeaders('xml');
    }
} 