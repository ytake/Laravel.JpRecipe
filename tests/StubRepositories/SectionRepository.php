<?php
namespace App\Tests\StubRepositories;

use App\Repositories\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
{
    // stub array
    /** @var array  */
    protected $sections = [
        [
            "section_id" => "1",
            "name" => "test1",
            "description" => "test1",
            "position" => "1"
        ],
        [
            "section_id" => "2",
            "name" => "test2",
            "description" => "test2",
            "position" => "1"
        ],
    ];

    /**
     * @param $sectionId
     * @return mixed
     */
    public function getSection($sectionId)
    {
        // TODO: Implement getSection() method.
    }

    /**
     * @param $column
     * @param $key
     * @return mixed
     */
    public function getSectionList($column, $key)
    {
        // TODO: Implement getSectionList() method.
    }

    /**
     * sections 取得
     * cache 240min
     * @return \stdClass
     */
    public function getSections()
    {
        $objectArray = [];
        foreach($this->sections as $section) {
            $objectArray[] = (object) $section;
        };
        return $objectArray;
    }

} 