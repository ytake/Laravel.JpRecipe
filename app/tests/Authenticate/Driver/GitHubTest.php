<?php
namespace App\Tests\Authenticate\Driver;

use App\Tests\TestCase;
use GuzzleHttp\Client;
use App\Authenticate\Driver\GitHub;

class GitHubTest extends TestCase
{
    /** @var \App\Authenticate\Driver\GitHub */
    protected $auth;

    public function setUp()
    {
        parent::setUp();
        $this->auth = new GitHub(new Client());
    }

    public function testInstance()
    {
        $this->assertInstanceOf('App\Authenticate\Driver\GitHub', $this->auth);
    }

    public function testUrl()
    {
        $this->assertInternalType('string', $this->auth->getUrl());
    }
}