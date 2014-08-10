<?php
namespace App\Tests\Commands;

use Mockery as m;
use App\Tests\TestCase;
use App\Commands\AddAccountCommand;
use App\Tests\StubRepositories\RecipeRepository;
use App\Tests\StubRepositories\CategoryRepository;

class AddAccountCommandTest extends TestCase
{
    /** @var AddAccountCommand  */
    protected $command;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->app->bind("App\Repositories\AclRepositoryInterface", "App\Tests\StubRepositories\AclRepository");
        $this->command = new AddAccountCommand(
            \App::make("App\\Authenticate\\Driver\\GitHub", [\App::make("GuzzleHttp\\ClientInterface")]),
            \App::make("App\Repositories\AclRepositoryInterface")
        );
    }

    public function testInstance()
    {
        $this->assertInstanceOf("App\Commands\AddAccountCommand", $this->command);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testExceptionCommand()
    {
        $this->command->run(new \Symfony\Component\Console\Input\ArrayInput([]), new \Symfony\Component\Console\Output\NullOutput);
    }

    public function testAddAccountCommand()
    {
        $this->command->run(new \Symfony\Component\Console\Input\ArrayInput(['account' => 'ytake']), new \Symfony\Component\Console\Output\NullOutput);
        $this->assertInstanceOf("Symfony\Component\Console\Output\NullOutput", $this->command->getOutput());
    }
}