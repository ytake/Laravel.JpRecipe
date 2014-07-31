<?php
namespace App\Tests;

class ConvertGfmTest extends TestCase
{

    public function testConvert()
    {
        $text = '{php}
function()
{
    echo "aaaa";
}
{/php}';

$convert = "```php
function()
{
    echo \"aaaa\";
}
```";
        $this->assertSame($convert, $this->convertGfm($text));
        $text = '{php}
function()
{
    echo "aaaa";
}
{/php}
{js}
console.log("aaaa");
{/js}
';

        $convert = "```php
function()
{
    echo \"aaaa\";
}
```
```js
console.log(\"aaaa\");
```
";
        $this->assertSame($convert, $this->convertGfm($text));
    }

    /**
     * @param string $string
     * @return string
     */
    protected function convertGfm($string)
    {
        $pattern = [
            "/{((?!\/)(php|js|bash|java|css|html))}/us",
            "/{(\/.*?)}/us",
            "/\[\[((.*?))\]\]/us"
        ];
        $replace = [
            "```$1",
            "```",
            "[$1](" . action('home.recipe') . ")"
        ];
        return preg_replace($pattern, $replace, $string);
    }
} 