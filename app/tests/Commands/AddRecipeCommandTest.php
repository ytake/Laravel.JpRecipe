<?php
namespace App\Tests\Commands;

use Mockery as m;
use App\Tests\TestCase;
use App\Commands\AddRecipeCommand;
use App\Tests\StubRepositories\RecipeRepository;
use App\Tests\StubRepositories\CategoryRepository;

class AddRecipeCommandTest extends TestCase
{
    /** @var AddRecipeCommand  */
    protected $command;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->command = new AddRecipeCommand(new CategoryRepository, new RecipeRepository);

    }

    public function testInstance()
    {
        $this->assertInstanceOf("App\Commands\AddRecipeCommand", $this->command);
    }

    public function testCommand()
    {
        \Config::shouldReceive('get')->once()
            ->with('recipe.document_path')->andReturn(__DIR__ . "/../../../docs/recipes");
        $this->assertInternalType('integer', $this->command->run(new \Symfony\Component\Console\Input\ArrayInput([]), new \Symfony\Component\Console\Output\NullOutput));
        $this->assertSame('recipes to database', $this->command->getDescription());
    }

    public function testParseContent()
    {
        $filePath = \File::get(__DIR__ . "/../docs/test.md");
        $reflectionMethod = $this->getProtectMethod($this->command, 'getParseContents');
        $result = $reflectionMethod->invokeArgs($this->command, ["solution", $filePath]);
$text = "
unit testing
{php}
phpunit
{/php}
";
        $this->assertSame($text, $result);
    }

    public function testParseHeader()
    {
        $filePath = \File::get(__DIR__ . "/../docs/test.md");
        $reflectionMethod = $this->getProtectMethod($this->command, 'getParseHeader');
        $result = $reflectionMethod->invokeArgs($this->command, ["title", $filePath]);
        $this->assertSame("test.md", $result);
    }

    public function testConvertGfm()
    {
        $filePath = \File::get(__DIR__ . "/../docs/test.md");
        $reflectionMethod = $this->getProtectMethod($this->command, 'convertGfm');
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
        $result = $reflectionMethod->invokeArgs($this->command, ["string" => $text]);
        $this->assertSame($convert, $result);
    }
}