<?php
namespace App\Tests\Presenter;

use App\Presenter\Markdown;
use App\Tests\TestCase;

class MarkdownTest extends TestCase
{
    /** @var \App\Presenter\Markdown  */
    protected $markdown;

    public function setUp()
    {
        parent::setUp();
        \App::bind("App\Repositories\RecipeRepositoryInterface", "App\Tests\StubRepositories\RecipeRepository");
        $this->markdown = new Markdown(new \Parsedown, \App::make("App\Repositories\RecipeRepositoryInterface"));
    }

    public function testInstance()
    {
        $this->assertInstanceOf('App\Presenter\Markdown', $this->markdown);
    }

    public function testProperty()
    {
        $reflectionProperty = $this->getProtectProperty('App\Presenter\Markdown', 'parser');
        $this->assertInstanceOf('Parsedown', $reflectionProperty->getValue($this->markdown));
    }

    public function testRender()
    {
        $create = $this->markdown->render('##markdown');
        $this->assertSame("<h2>markdown</h2>", $create);
        $text = "```php
echo 'hello';
```";
        $output = "<pre><code class=\"language-php\">echo 'hello';</code></pre>";
        $this->assertSame($output, $this->markdown->render($text));
        $text = "[aaaa](http://example.com)";
        $this->assertSame("<p><a href=\"http://example.com\">aaaa</a></p>", $this->markdown->render($text));
        $this->assertSame("<p><code>Person</code></p>", $this->markdown->render("`Person`"));
    }


    public function testCacheRender()
    {
        $create = $this->markdown->render('##markdown', 'testing');
        $this->assertSame("<h2>markdown</h2>", $create);
        $this->assertSame("<h2>markdown</h2>", \Cache::get('testing'));
    }

    public function testConvert()
    {
        $text = "[[Speeding up Development with Generators]]";
        $convert = $this->markdown->convertToRef($text);
        $tmp = "[Speeding up Development with Generators](http://localhost/recipe/1)";
        $this->assertSame($tmp, $convert);
        $convert = $this->markdown->convertToRef("");
        $this->assertSame("", $convert);
    }
}