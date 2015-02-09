<?php
namespace App\Feed;

use Zend\Http\Client;
use Zend\Feed\Exception\RuntimeException;

/**
 * Class Reader
 * @package App\Feed
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Reader implements ReaderInterface
{
    /** @var \Zend\Http\Client */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $url
     * @param int $limit
     * @return array
     */
    public function read($url, $limit = 5)
    {
        $data = [];
        $this->client->setUri($url)
            ->setOptions(['adapter' => 'Zend\Http\Client\Adapter\Curl']);
        try {
            \Zend\Feed\Reader\Reader::setHttpClient($this->client);
            $feed = \Zend\Feed\Reader\Reader::import($url);
            if ($feed) {
                $i = 0;
                foreach ($feed as $entry) {
                    $edata = [
                        'title' => $entry->getTitle(),
                        'description' => preg_replace("/<img(.+?)>/", "", $entry->getDescription()),
                        'dateModified' => $entry->getDateModified(),
                        'authors' => $entry->getAuthors(),
                        'link' => $entry->getLink(),
                        'content' => $entry->getContent()
                    ];
                    $data[] = (object)$edata;
                    $i++;
                    if ($i == $limit) {
                        break;
                    }
                }
            }
        } catch (RuntimeException $exception) {
            $data[] = [];
        }
        return $data;
    }
}
