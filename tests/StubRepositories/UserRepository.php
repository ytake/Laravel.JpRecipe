<?php
namespace App\Tests\StubRepositories;

use Illuminate\Database\QueryException;
use App\Repositories\UserRepositoryInterface;

/**
 * Class UserRepository
 * @package App\Tests\StubRepositories
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class UserRepository implements UserRepositoryInterface
{

    protected $array = [
        'user_id' => 1,
        'user_name' => 'testing',
        'github_id' => 1,
        'remember_token' => 'testing',
        'created_at' => '1970-01-01 00:00:00',
        'updated_at' => '1970-01-01 00:00:00'
    ];

    /**
     * @param $id
     * @return mixed
     */
    public function getUser($id)
    {
        return (object) $this->array;
    }

    /**
     *
     * @param integer $githubId
     * @return mixed|static
     */
    public function getAuthenticateUser($githubId)
    {
        return (object) $this->array;
    }

    /**
     * @param $identifier
     * @param $token
     * @return mixed|static
     */
    public function retrieveByToken($identifier, $token)
    {
        return (object) $this->array;
    }

    /**
     * @param $id
     * @param $token
     * @return int
     */
    public function updateToken($id, $token)
    {
        return 1;
    }

    /**
     * @param array $attribute
     * @return mixed
     */
    public function addUser(array $attribute)
    {
        return (object) $this->array;
    }

}