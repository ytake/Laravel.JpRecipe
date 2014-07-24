<?php
namespace App\Presenter;

use Ciconia\Ciconia;
use Ciconia\Extension\Gfm;

/**
 * Class Markdown
 * @package App\Presenter
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 *
 * @see https://help.github.com/articles/github-flavored-markdown
 */
class Markdown implements MarkdownInterface
{

    /** @var \Ciconia\Ciconia  */
    protected $parser;

    /**
     * @param Ciconia $parser
     */
    public function __construct(Ciconia $parser)
    {
        $this->parser = $parser;
        $this->parser->addExtension(new CodeBlockExtension);
        $this->parser->addExtension(new Gfm\TaskListExtension());
        $this->parser->addExtension(new Gfm\InlineStyleExtension());
        $this->parser->addExtension(new Gfm\WhiteSpaceExtension());
        $this->parser->addExtension(new Gfm\TableExtension());
        $this->parser->addExtension(new Gfm\UrlAutoLinkExtension());
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
            return $this->parser->render($text);
        }

        if(\Cache::has($cacheKey)) {
            return \Cache::get($cacheKey);
        }
        $result = $this->parser->render($text);
        \Cache::put($cacheKey, $text, $life);
        return $result;
    }
}