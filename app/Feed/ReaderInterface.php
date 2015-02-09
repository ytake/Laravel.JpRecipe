<?php
namespace App\Feed;

/**
 * Interface ReaderInterface
 * @package App\Feed
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
interface ReaderInterface
{

    /**
     * @param string $url
     * @param int $limit
     * @return array
     */
    public function read($url, $limit = 5);

}
