<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\AnalyticsRepositoryInterface;

/**
 * Class CleanCommand
 * @package App\Commands
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class CleanCommand extends Command
{

    /**
     * The console command name.
     * @var string
     */
    protected $name = 'jp-recipe:cleanup';

    /**
     * The console command description.
     * @var string
     */
    protected $description = "redis cleanup";

    /** @var AnalyticsRepositoryInterface */
    protected $analytics;

    /**
     * @param AnalyticsRepositoryInterface $analytics
     */
    public function __construct(AnalyticsRepositoryInterface $analytics)
    {
        parent::__construct();
        $this->analytics = $analytics;
    }

    /**
     * @throws \Exception
     * @throws \Predis\Connection\ConnectionException
     */
    public function fire()
    {
        try {
            $this->analytics->getDisableKey();
            $this->info("cleanup for Redis key");
        } catch(\Predis\Connection\ConnectionException $error) {
            throw $error;
        }
    }

}