<?php
namespace App\Authenticate\Driver;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserProviderInterface;
use App\Repositories\AclRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

/**
 * Class VoltDBUserProvider
 * @package Ytake\LaravelVoltDB\Authenticate
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 * @license http://opensource.org/licenses/MIT MIT
 */
class GithubUserProvider implements UserProviderInterface
{

    /** @var AclRepositoryInterface  */
    protected $acl;

    /** @var UserRepositoryInterface */
    protected $user;

    /**
     * @param AclRepositoryInterface $acl
     * @param UserRepositoryInterface $user
     */
    public function __construct(AclRepositoryInterface $acl, UserRepositoryInterface $user)
    {
        $this->acl = $acl;
        $this->user = $user;
    }

    /**
     * Retrieve a user by their unique identifier.
     * use stored procedure
     *
     * @param  mixed $identifier
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveById($identifier)
    {
        $user = $this->user->getUser($identifier);
		if (!is_null($user)) {
            return new GithubUser((array) $user);
        }
    }

    /**
     * Retrieve a user by by their unique identifier and "remember me" token.
     *
     * @param  mixed $identifier
     * @param  string $token
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveByToken($identifier, $token)
    {
        $user = $this->user->retrieveByToken($identifier, $token);
        if(!is_null($user)) {
            return new GithubUser((array) $user);
        }
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Auth\UserInterface $user
     * @param  string $token
     * @return void
     */
    public function updateRememberToken(UserInterface $user, $token)
    {
        $this->user->updateToken($user->getAuthIdentifier(), $token);
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array $credentials
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        $isAccess = $this->acl->getAccessControl($credentials['name']);
        if($isAccess) {

            $user = $this->user->getAuthenticateUser($credentials['id']);
            if(!$user) {
                $user = $this->user->addUser($credentials);
            }
            if (!is_null($user)) {
                return new GithubUser((array)$user);
            }
        }
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Auth\UserInterface $user
     * @param  array $credentials
     * @return bool
     */
    public function validateCredentials(UserInterface $user, array $credentials)
    {
        return true;
    }
}