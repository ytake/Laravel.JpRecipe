<?php

namespace App\Services;

/**
 * Class ContentService
 *
 * @package App\Services
 */
class ContentService
{
    /**
     * @param $tag
     * @param $file
     * @return bool
     */
    public function parseContents($tag, $file)
    {
        $preg = preg_match_all("/\{$tag\}(.*?)\{\/$tag\}/us", $file, $matches);
        if ($preg) {
            return end($matches)[0];
        }

        return false;
    }

    /**
     * @param $element
     * @param $file
     * @return bool|string
     */
    public function parseHeader($element, $file)
    {
        $preg = preg_match_all("/---(.*?)---/us", $file, $matches);
        if ($preg) {
            $explode = explode("\n", end($matches)[0]);
            if ($explode) {
                return $this->replaceElement($element, $explode);
            }
            return false;
        }
        return false;
    }

    /**
     * @param array $contents
     * @return string
     */
    protected function replaceElement($element, array $contents)
    {
        foreach ($contents as $row) {
            switch ($element) {
                case 'title':
                    return $this->replaceContent($row, 'Title:');
                    break;
                case 'position':
                    return $this->replaceContent($row, 'Position:');
                    break;
                case 'topics':
                    return $this->replaceContent($row, 'Topics:');
                    break;
            }
        }
    }

    /**
     * @param $content
     * @param $text
     * @return string
     */
    protected function replaceContent($content, $text)
    {
        if (strpos($content, $text) === 0) {
            return trim(str_replace($text, '', $content));
        }
        return $content;
    }
}
