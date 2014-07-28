<?php
namespace App\Repositories\Fluent;

use App\Repositories\CategoryRepositoryInterface;

/**
 * Class CategoryRepository
 * @package App\Repositories\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class CategoryRepository extends AbstractFluent implements CategoryRepositoryInterface
{

    /** @var string  */
    protected $cacheKey = "category:";

    /** @var string */
    protected $table = 'categories';

    /** @var  */
    protected $primary = 'category_id';

    /**
     *
     * @param array $attribute
     * @return mixed
     */
    public function addCategory(array $attribute)
    {
        return $this->add($attribute);
    }

    /**
     * @return array|static[]
     */
    public function getCategories()
    {
        return $this->getConnection('slave')
            ->orderByRaw('section_id, position ASC')
            ->remember(240, 'category_list')->get();
    }

    /**
     * @param $column
     * @param $key
     * @return array|\Illuminate\Database\Query\Builder|mixed|static
     */
    public function getCategoryList($column, $key)
    {
        return $this->getConnection('slave')
            ->orderByRaw('section_id, position ASC')
            ->remember(240, 'category_list')->lists($column, $key);
    }

    /**
     * @param $sectionId
     * @return array|static[]
     */
    public function getCategoryFromSection($sectionId)
    {
        return $this->getConnection('slave')
            ->where('section_id', $sectionId)
            ->remember(240, "{$this->cacheKey}section:{$sectionId}")
            ->get();
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getCategory($id)
    {
        return $this->find($id);
    }
}