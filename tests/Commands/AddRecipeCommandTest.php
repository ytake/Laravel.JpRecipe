<?php

/**
 * Class AddRecipeCommandTest
 * @see \App\Console\Commands\AddRecipeCommand
 */
class AddRecipeCommandTest extends \TestCase
{
    /** @var \App\Console\Commands\AddRecipeCommand */
    protected $command;

    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    use OverrideDatabaseConnections;

    public function setUp()
    {
        parent::setUp();
        $this->command = new \App\Console\Commands\AddRecipeCommand;
        $this->command->setLaravel($this->app);
        $this->overrideDatabase();
    }

    public function testCommandHandler()
    {
        $this->runDatabaseMigrations();
        $output = new \Symfony\Component\Console\Output\BufferedOutput;
        $this->command->run(
            new \Symfony\Component\Console\Input\ArrayInput([]),
            $output
        );
    }
}
