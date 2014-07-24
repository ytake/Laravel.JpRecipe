<?php
namespace App\Tests\Presenter;

use App\Presenter\Markdown;
use App\Tests\TestCase;
use Ciconia\Ciconia;

class MarkdownTest extends TestCase
{
    /** @var \App\Presenter\Markdown  */
    protected $markdown;

    public function setUp()
    {
        parent::setUp();
        $this->markdown = new Markdown(new Ciconia);
    }

    public function testInstance()
    {
        $this->assertInstanceOf('App\Presenter\Markdown', $this->markdown);
    }

    public function testRender()
    {
        $create = $this->markdown->render('##markdown');
        $this->assertSame("<h2>markdown</h2>", $create);
        $text = "```php
echo 'hello';
```";
        $output = "<pre class=\"highlight highlight-php\"><code>echo 'hello';
</code></pre>";
        $this->assertSame($output, $this->markdown->render($text));
    }
} 