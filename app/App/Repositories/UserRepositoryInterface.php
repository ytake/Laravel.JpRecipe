<?php
namespace App\Repositories;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories
 */
interface UserRepositoryInterface
{

    /**
     * @param $id
     * @return mixed
     */
    public function getUser($id);

    /**
     * @param integer $githubId
     * @return mixed|static
     */
    public function getAuthenticateUser($githubId);

    /**
     * @param $identifier
     * @param $token
     * @return mixed
     */
    public function retrieveByToken($identifier, $token);

    /**
     * @param $id
     * @param $token
     * @return mixed
     */
    public function updateToken($id, $token);

    /**
     * @param array $attribute
     * @return mixed
     */
    public function addUser(array $attribute);
}