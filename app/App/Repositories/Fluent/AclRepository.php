<?php
namespace App\Repositories\Fluent;

use App\Repositories\AclRepositoryInterface;

/**
 * Class AclRepository
 * @package App\Repositories\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AclRepository extends AbstractFluent implements AclRepositoryInterface
{

    /** @var string  table name */
    protected $table = 'access_controls';

    /** @var string  */
    protected $master = 'master';

    /** @var string  */
    protected $slave = 'slave';

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

    /**
     * add access control with cache clear
     * @param $name
     * @return mixed
     */
    public function setAccessControl($name)
    {
        \Cache::forget("acl:{$name}");
        return $this->add(['name' => $name]);
    }
}