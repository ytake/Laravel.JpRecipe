<?php
namespace App\Tests\Authenticate\Driver;

use Mockery as m;
use App\Tests\TestCase;
use App\Tests\StubRepositories\AclRepository;
use App\Tests\StubRepositories\UserRepository;
use App\Authenticate\Driver\GithubUserProvider;

class GitHubUserProviderTest extends TestCase
{
    /** @var GithubUserProvider */
    protected $provider;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->provider = new GithubUserProvider(new AclRepository, new UserRepository);
    }

    public function testInstance()
    {
        $this->assertInstanceOf('App\Authenticate\Driver\GithubUserProvider', $this->provider);
    }

    public function testRetrieveById()
    {
        $this->assertInstanceOf('App\Authenticate\Driver\GithubUser', $this->provider->retrieveById(1));
    }

    public function testRetrieveByCredentials()
    {
        $this->assertInstanceOf('App\Authenticate\Driver\GithubUser',
            $this->provider->retrieveByCredentials(['name' => 'testing', 'id' => 1])
        );
    }

    public function testRetrieveByToken()
    {
        $this->assertInstanceOf('App\Authenticate\Driver\GithubUser',
            $this->provider->retrieveByToken(1, 'testing')
        );
    }

    public function testUpdateRememberToken()
    {
        $user = m::mock('App\Authenticate\Driver\GithubUser');
        $user->shouldReceive('getAuthIdentifier')->once()->andReturn(1);
        $this->assertNull($this->provider->updateRememberToken($user, 'testing'));
    }

    public function testValidateCredentials()
    {
        $user = m::mock('App\Authenticate\Driver\GithubUser');
        $this->assertTrue($this->provider->validateCredentials($user, []));
    }
}