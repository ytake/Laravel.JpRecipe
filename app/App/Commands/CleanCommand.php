<?php
namespace App\Commands;

use Illuminate\Console\Command;

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

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @return void
     */
    public function fire()
    {

    }

}