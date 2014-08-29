<?php
namespace App\Tests\Commands;

use Mockery as m;
use App\Tests\TestCase;
use App\Commands\AddRecipeCommand;
use App\Tests\StubRepositories\TagRepository;
use Symfony\Component\Console\Output\NullOutput;
use App\Tests\StubRepositories\RecipeRepository;
use App\Tests\StubRepositories\CategoryRepository;
use App\Tests\StubRepositories\RecipeTagRepository;

class AddRecipeCommandTest extends TestCase
{
    /** @var AddRecipeCommand  */
    protected $command;
    /** @var  CategoryRepository */
    protected $category;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->category = new CategoryRepository;
        $this->command = new AddRecipeCommand(
            $this->category,
            new RecipeRepository,
            new TagRepository,
            new RecipeTagRepository
        );

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

    public function testAddRecipes()
    {
        $reflectionProperty = $this->getProtectProperty($this->command, 'output');
        $reflectionProperty->setValue($this->command, new NullOutput());
        $dir = scandir(app_path() . "/tests/docs");
        $reflectionMethod = $this->getProtectMethod($this->command, 'addRecipes');
        $reflectionMethod->invokeArgs($this->command, [$dir, app_path() . "/tests/docs", $this->category->getCategory(1)]);
        $this->assertInstanceOf("Symfony\Component\Console\Output\NullOutput", $this->command->getOutput());
    }

    public function testAddRecipeCommand()
    {
        $this->command->run(new \Symfony\Component\Console\Input\ArrayInput([]), new \Symfony\Component\Console\Output\NullOutput);
        $this->assertInstanceOf("Symfony\Component\Console\Output\NullOutput", $this->command->getOutput());
    }
}