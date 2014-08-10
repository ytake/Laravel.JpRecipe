<?php
namespace App\Commands;

use Illuminate\Console\Command;
use App\Authenticate\Driver\GitHub;
use App\Repositories\AclRepositoryInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class AddAccountCommand
 * @package App\Commands
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AddAccountCommand extends Command
{

    /**
     * The console command name.
     * @var string
     */
    protected $name = 'jp-recipe:add-allow-account';

    /**
     * The console command description.
     * @var string
     */
    protected $description = "add to ACL";

    /** @var GitHub */
    protected $github;

    /** @var AclRepositoryInterface */
    protected $acl;

    /**
     * @param GitHub $github
     * @param AclRepositoryInterface $acl
     */
    public function __construct(GitHub $github, AclRepositoryInterface $acl)
    {
        parent::__construct();
        $this->github = $github;
        $this->acl = $acl;
    }

    /**
     * Execute the console command.
     * @return void
     */
    public function fire()
    {
        $accountName = $this->input->getArgument('account');
        try {
            $data = $this->github->getGithubUser($accountName);

            if(isset($data['id'])) {
                $this->acl->setAccessControl($accountName);
                $this->info("added : {$accountName}");
            }
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->error("{$accountName} Not Found");
        } catch (\Illuminate\Database\QueryException $e) {
            $this->info("{$accountName} has already been added");
        }
    }

    /**
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['account', InputArgument::REQUIRED, 'add allow account list.'],
        ];
    }
}