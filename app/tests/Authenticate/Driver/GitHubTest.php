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

    /**
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function testGetToken()
    {
        // disable access_token
        $this->auth->getToken('testing');
    }

    /**
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function testGetUser()
    {
        $this->auth->getUser('testing');
    }

    /**
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function testFailedGithubUser()
    {
        $this->auth->getGithubUser('laravel-js-recipes:testing');
    }

    public function testTrueGithubUser()
    {
        $this->assertInternalType('array', $this->auth->getGithubUser('ytake'));
    }
}