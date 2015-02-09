<?php
namespace App\Repositories;

/**
 * Interface TagRepositoryInterface
 * @package App\Repositories
 */
interface TagRepositoryInterface
{

    /**
     * tags 取得
     * @return \stdClass
     */
    public function getTags();

    /**
     * @param integer $tagId
     * @return \stdClass
     */
    public function getTag($tagId);

    /**
     * @param string $name
     * @param integer $lifeTime
     * @return mixed
     */
    public function getTagFromName($name, $lifeTime = 240);

    /**
     * @param array $attribute
     * @return \stdClass
     */
    public function addTag(array $attribute);
}