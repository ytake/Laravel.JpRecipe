<?php
namespace App\Tests\Commands;

use Mockery as m;
use App\Tests\TestCase;
use App\Commands\CleanCommand;

class CleanCommandTest extends TestCase
{
    /** @var CleanCommand  */
    protected $command;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->app->bind("App\Repositories\AnalyticsRepositoryInterface", "App\Tests\StubRepositories\AnalyticsRepository");
        $this->command = new CleanCommand(
            \App::make("App\Repositories\AnalyticsRepositoryInterface")
        );
    }

    public function testInstance()
    {
        $this->assertInstanceOf("App\Commands\CleanCommand", $this->command);
    }

    public function testCleanCommand()
    {
        $this->command->run(new \Symfony\Component\Console\Input\ArrayInput([]), new \Symfony\Component\Console\Output\NullOutput);
        $this->assertInstanceOf("Symfony\Component\Console\Output\NullOutput", $this->command->getOutput());
    }
}