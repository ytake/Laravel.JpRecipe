<?php
namespace App\Feed;

use Zend\Feed\Exception\RuntimeException;

/**
 * Class Reader
 * @package App\Feed
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Reader
{

    /**
     * @param string $url
     * @param int $limit
     * @return array
     */
    public function read($url, $limit = 5)
    {
        $data = [];
        try {
            $feed = \Zend\Feed\Reader\Reader::import($url);
            if ($feed) {
                $i = 0;
                foreach ($feed as $entry) {
                    $edata = [
                        'title' => $entry->getTitle(),
                        'description' => $entry->getDescription(),
                        'dateModified' => $entry->getDateModified(),
                        'authors' => $entry->getAuthors(),
                        'link' => $entry->getLink(),
                        'content' => $entry->getContent()
                    ];
                    $data[] = (object) $edata;
                    $i++;
                    if($i == $limit) {
                        break;
                    }
                }
            }
        } catch(RuntimeException $exception) {

        }
        return $data;
    }
} 