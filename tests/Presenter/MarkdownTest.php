<?php

class MarkdownTest extends \TestCase
{
    /** @var \App\Presenter\Markdown */
    protected $markdown;

    /** @var string  */
    protected $content = '# Header {.problem}
PHPUnitの実行方法がわかりません
# Header {.credit}
[linkref]: url optional title';

    public function setUp()
    {
        $this->markdown = new \App\Presenter\Markdown(
            new ParsedownExtra()
        );
    }

    public function testRender()
    {
        $render = $this->markdown->render($this->content, 0);
        $this->assertContains('<h1 class="problem">Header</h1>', $render);
    }
}
