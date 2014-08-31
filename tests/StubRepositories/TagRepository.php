<?php
namespace App\Tests\StubRepositories;

use App\Repositories\TagRepositoryInterface;

/**
 * Class TagRepository
 * @package App\Tests\StubRepositories
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class TagRepository implements TagRepositoryInterface
{


    /**
     * tags 取得
     * @return \stdClass
     */
    public function getTags()
    {

    }

    /**
     * @param integer $tagId
     * @return \stdClass
     */
    public function getTag($tagId)
    {

    }

    /**
     * @param string $name
     * @param int $lifeTime
     * @return mixed|static
     */
    public function getTagFromName($name, $lifeTime = 240)
    {

    }

    /**
     * @param array $attribute
     * @return \stdClass
     */
    public function addTag(array $attribute)
    {

    }

}