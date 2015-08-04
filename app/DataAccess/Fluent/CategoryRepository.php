<?php
/**
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace App\DataAccess\Fluent;

use App\Repositories\CategoryRepositoryInterface;

/**
 * Class CategoryRepository
 *
 * @package App\Repositories\Fluent
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class CategoryRepository extends AbstractFluent implements CategoryRepositoryInterface
{
    /** @var string */
    protected $cacheKey = "category:";

    /** @var string */
    protected $table = 'categories';

    /** @var */
    protected $primary = 'category_id';

    /**
     *
     * @param array $attribute
     * @return mixed
     */
    public function addCategory(array $attribute)
    {
        $attribute['slug'] = \Str::slug($attribute['name']);
        if (!isset($attribute['position'])) {
            $position = $this->getCategoryPosition($attribute['section_id']);
            $attribute['position'] = (int)$position + 1;
        }
        \Cache::forget('category_list');
        \Cache::forget('nav_category');

        return $this->add($attribute);
    }

    /**
     * @param       $id
     * @param array $attribute
     * @return mixed
     */
    public function updateCategory($id, array $attribute)
    {
        \Cache::forget('category_list');

        return $this->update($id, $attribute);
    }

    /**
     * @return array|static[]
     */
    public function getCategories()
    {
        return $this->getConnection('slave')
            ->orderByRaw('section_id, position ASC')->get();
        // ->remember(240, 'category_list')->get();
    }

    /**
     * @param $column
     * @param $key
     * @return array|\Illuminate\Database\Query\Builder|mixed|static
     */
    public function getCategoryList($column, $key)
    {
        return $this->getConnection('slave')
            ->orderByRaw('section_id, position ASC')->lists($column, $key);
    }

    /**
     * @param $sectionId
     * @return array|static[]
     */
    public function getCategoryFromSection($sectionId)
    {
        return $this->getConnection('slave')
            ->where('section_id', $sectionId)->orderBy('position', 'ASC')
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

    /**
     * @param $slug
     * @return mixed|static
     */
    public function getCategoryFromSlug($slug)
    {
        return $this->getConnection('slave')
            ->where('slug', strtolower($slug))
            ->first();
    }

    /**
     * @param $sectionId
     * @return mixed
     */
    private function getCategoryPosition($sectionId)
    {
        return $this->getConnection('slave')
            ->where('section_id', $sectionId)->max('position');
    }

    /**
     * @return array|mixed
     */
    public function getNavigationCategory()
    {
        if (\Cache::has('nav_category')) {
            return \Cache::get('nav_category');
        }
        $sql = "SELECT cat.*, COUNT(recipe.category_id) AS recipe_count"
            . " FROM categories AS cat"
            . " LEFT JOIN recipes AS recipe ON recipe.category_id = cat.category_id"
            . " GROUP BY cat.category_id"
            . " ORDER BY slug ASC";
        $result = \DB::connection('slave')->select($sql);
        if ($result) {
            \Cache::add('nav_category', $result, 360);
        }

        return $result;
    }
}
