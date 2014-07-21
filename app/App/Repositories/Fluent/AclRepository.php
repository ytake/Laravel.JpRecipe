<?php
namespace App\Repositories\Fluent;

use App\Repositories\AclRepositoryInterface;

/**
 * Class AclRepository
 * @package App\Repositories\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AclRepository implements AclRepositoryInterface
{

    /**
     * アクセス可能リストに登録されているか
     * @param $name
     * @return mixed|static
     */
    public function getAccessControl($name)
    {
        return \DB::connection('slave')->table('access_controls')
            ->where('name', $name)->remember(480, "acl:{$name}")->first();
    }
}