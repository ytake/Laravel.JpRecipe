<?php
namespace App\Presenter;

use Ciconia\Common\Text;
use Ciconia\Markdown;
use Ciconia\Renderer\RendererAwareTrait;
use Ciconia\Extension\Gfm\FencedCodeBlockExtension;

/**
 * Class CodeBlockExtension
 * @package App\Presenter
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class CodeBlockExtension extends FencedCodeBlockExtension
{

    use RendererAwareTrait;

    /**
     * @var Markdown
     */
    private $markdown;

    /**
     * {@inheritdoc}
     */
    public function register(Markdown $markdown)
    {
        $this->markdown = $markdown;

        // should be run before first hashHtmlBlocks
        $markdown->on('initialize', array($this, 'processFencedCodeBlock'));
    }

    /**
     * @param Text $text
     */
    public function processFencedCodeBlock(Text $text)
    {
        /** @noinspection PhpUnusedParameterInspection */
        $text->replace('{
            (?:\n\n|\A)
            (?:
                ([`~]{3})[ ]*         #1 fence ` or ~
                    ([a-zA-Z0-9]*?)?  #2 language [optional]
                \n+
                (.*?)\n                #3 code block
                \1                    # matched #1
            )
        }smx', function (Text $w, Text $fence, Text $lang, Text $code) {
                $options = array();

                if (!$lang->isEmpty()) {
                    $options = array(
                        'attr' => array(
                            'class' => 'highlight highlight-' . $lang->lower()
                        )
                    );
                }

                $code->escapeHtml(ENT_NOQUOTES);
                $this->markdown->emit('detab', array($code));
                $code->replace('/\A\n+/', '');
                $code->replace('/\s+\z/', '');

                return "\n\n" . $this->getRenderer()->renderCodeBlock($code, $options) . "\n\n";
            });
    }
} 