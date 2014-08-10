<?php
namespace App\Tests\StubRepositories;

use App\Repositories\AclRepositoryInterface;

/**
 * Class AclRepository
 * @package App\Repositories\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AclRepository implements AclRepositoryInterface
{

    protected $user = [
        'name' => 'testing',
        'created_at' => "1970-01-00 00:00:00"
    ];

    /**
     * アクセス可能リストに登録されているか
     * @param $name
     * @return mixed|static
     */
    public function getAccessControl($name)
    {
        return (object) $this->user;
    }

    /**
     * add access control with cache clear
     * @param $name
     * @return mixed
     */
    public function setAccessControl($name)
    {
        return true;
    }
}