<?php

use Mockery as m;

class CleanCommandTest extends \TestCase
{
    /** @var \App\Console\Commands\CleanCommand */
    protected $command;

    public function setUp()
    {
        parent::setUp();
        $analyzeMock = m::mock(\App\Repositories\AnalyticsRepositoryInterface::class);
        $analyzeMock->shouldReceive('deleteDisableKey')->andReturnNull();
        $this->command = new \App\Console\Commands\CleanCommand(
            new \App\Services\AnalyticsService(
                $analyzeMock
            )
        );
        $this->command->setLaravel($this->app);
    }

    public function testRun()
    {
        $output = new \Symfony\Component\Console\Output\BufferedOutput();
        $this->command->run(
            new \Symfony\Component\Console\Input\ArrayInput([]),
            $output
        );
        $this->assertSame('cleanup for Redis keys', trim($output->fetch()));
    }
}
