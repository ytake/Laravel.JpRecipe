<?php
namespace App\Repositories\Fluent;

/**
 * Class SectionRepository
 * @package App\Repositories\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class SectionRepository extends AbstractFluent
{

    protected $cacheKey = "section:";

    /** @var string */
    protected $table = 'sections';

    /** @var  */
    protected $primary = 'section_id';

    /**
     * sections 取得
     * cache 240min
     * @return \stdClass
     */
    public function getSections()
    {
        return $this->getConnection('slave')
            ->orderBy('position', 'ASC')
            ->remember(240, 'section_list')
            ->get([
                'section_id', 'name', 'description', 'position'
                ]);
    }

}