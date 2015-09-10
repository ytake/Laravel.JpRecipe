<?php

namespace App\Parser;

/**
 * Class ContentParser
 *
 * @package App\Parser
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ContentParser
{
    /**
     * @param $content
     *
     * @return string[]
     */
    public function parse($content)
    {
        $element = [];
        if (preg_match("/---(.*?)---/us", $content, $matches)) {
            $element = $this->replaceElement(explode("\n", trim($matches[1])));
            $element['body'] = $this->detectContent(
                trim(str_replace($matches[0], '', $content))
            );
        }
        return $element;
    }

    /**
     * @param array $contents
     *
     * @return string[]
     */
    protected function replaceElement(array $contents)
    {
        $content = [];
        foreach ($contents as $row) {
            $line = explode(':', $row);
            $accessor = trim(mb_strtolower($line[0]));
            $content[$accessor] = (isset($line[1])) ? trim($line[1]) : null;
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
