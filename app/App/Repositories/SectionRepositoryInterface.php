<?php
namespace App\Repositories;

/**
 * Interface SectionRepositoryInterface
 * @package App\Repositories
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
interface SectionRepositoryInterface
{

    /**
     * sections 取得
     * cache 240min
     * @return \stdClass
     */
    public function getSections();

    /**
     * @param $column
     * @param $key
     * @return mixed
     */
    public function getSectionList($column, $key);
}