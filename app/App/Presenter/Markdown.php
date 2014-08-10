<?php
namespace App\Presenter;

use Parsedown;

/**
 * Class Markdown
 * @package App\Presenter
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 *
 * @see https://help.github.com/articles/github-flavored-markdown
 */
class Markdown implements MarkdownInterface
{

    /** @var \Parsedown  */
    protected $parser;

    /**
     * @param Parsedown $parser
     */
    public function __construct(Parsedown $parser)
    {
        $this->parser = $parser;
    }

    /**
     *
     * @param $text
     * @param null $cacheKey
     * @param int $life cache life time
     * @return mixed|string
     */
    public function render($text, $cacheKey = null, $life = 360)
    {
        //
        if(!$life || is_null($cacheKey)) {
            return $this->parser->text($text);
        }
        if(\Cache::has($cacheKey)) {
            return \Cache::get($cacheKey);
        }
        $result = $this->parser->text($text);
        \Cache::put($cacheKey, $result, $life);
        return $result;
    }
}