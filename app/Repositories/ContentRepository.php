<?php

namespace App\Repositories;

use App\Entities\Content;

/**
 * Class ContentRepository
 *
 * @package App\Services
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ContentRepository
{
    /** @var Content */
    protected $content;

    /**
     * @param $content
     *
     * @return Content|bool
     */
    public function parse($content)
    {
        $result = preg_replace_callback("/---(.*?)---/us",
            function ($matches) {
                $this->content = $this->replaceElement(explode("\n", trim(end($matches))));
                return '';
            }, $content);
        $detect = $this->detectContent($result);
        if ($detect) {
            $this->content->body = trim($result);
            return $this->content;
        }
        return false;
    }

    /**
     * @param array $contents
     *
     * @return Content[]
     */
    protected function replaceElement(array $contents)
    {
        $content = new Content;
        foreach ($contents as $row) {
            $line = explode(':', $row);
            $accessor = trim(mb_strtolower($line[0]));
            $content->$accessor = (isset($line[1])) ? trim($line[1]) : null;
        }
        return $content;
    }

    /**
     * @param $value
     *
     * @return null|string
     */
    protected function detectContent($value)
    {
        $clean = trim($value);
        return ($clean != '') ? $clean : null;
    }
}
