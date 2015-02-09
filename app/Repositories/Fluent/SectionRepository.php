<?php
namespace App\Repositories\Fluent;

use App\Repositories\SectionRepositoryInterface;

/**
 * Class SectionRepository
 * @package App\Repositories\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class SectionRepository extends AbstractFluent implements SectionRepositoryInterface
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
            // ->remember(240, 'sections')
            ->get([
                'section_id', 'name', 'description', 'position'
                ]);
    }

    /**
     * @param $column
     * @param $key
     * @return \Illuminate\Database\Query\Builder|mixed|static
     */
    public function getSectionList($column, $key)
    {
        return $this->getConnection('slave')
            ->orderBy('section_id', 'ASC')
            // ->remember(240, 'section_list')
            ->lists($column, $key);
    }

    /**
     * @param $sectionId
     * @return mixed|static
     */
    public function getSection($sectionId)
    {
        return $this->find($sectionId);
    }
}