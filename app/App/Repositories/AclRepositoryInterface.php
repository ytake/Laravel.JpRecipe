<?php
namespace App\Repositories;

/**
 * Interface AclRepository
 * @package App\Repositories
 */
interface AclRepositoryInterface
{

    /**
     * アクセス可能リストに登録されているか
     * @param $name
     * @return mixed|static
     */
    public function getAccessControl($name);

    /**
     * アクセスコントロールにユーザーを追加
     * @param $name
     * @return mixed
     */
    public function setAccessControl($name);
}