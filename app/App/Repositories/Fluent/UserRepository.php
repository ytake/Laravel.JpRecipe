<?php
namespace App\Repositories\Fluent;

use Illuminate\Database\QueryException;
use App\Repositories\UserRepositoryInterface;

/**
 * Class UserRepository
 * @package App\Repositories\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class UserRepository extends AbstractFluent implements UserRepositoryInterface
{

    protected $cacheKey = "user:";
    /** @var string */
    protected $table = 'users';
    /** @var  */
    protected $primary = 'user_id';

    /**
     * @param $id
     * @return mixed
     */
    public function getUser($id)
    {
        return $this->find($id);
    }

    /**
     *
     * @param integer $githubId
     * @return mixed|static
     */
    public function getAuthenticateUser($githubId)
    {
        return $this->getConnection('slave')
            ->where('github_id', $githubId)->first();
    }

    /**
     * @param $identifier
     * @param $token
     * @return mixed|static
     */
    public function retrieveByToken($identifier, $token)
    {
        return $this->getConnection('slave')
            ->where('user_id', $identifier)
            ->where('remember_token', $token)
            ->first();
    }

    /**
     * @param $id
     * @param $token
     * @return int
     */
    public function updateToken($id, $token)
    {
        return $this->update($id, ['remember_token' => $token]);
    }

    /**
     * @param array $attribute
     * @return mixed
     */
    public function addUser(array $attribute)
    {

        try {
            $id = $this->add([
                    'github_id' => $attribute['id'],
                    'user_name' => $attribute['name']
                ]
            );
            return $this->getUser($id);
        } catch(QueryException $e) {
            return $this->getAuthenticateUser($attribute['github_id']);
        }
    }

}