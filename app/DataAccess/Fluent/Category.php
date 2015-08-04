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

use Illuminate\Support\Str;

/**
 * Class Category
 *
 * @package App\DataAccess\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Category extends AbstractFluent
{
    /** @var string */
    protected $table = 'categories';

    /** @var string */
    protected $primary = 'category_id';

    /**
     *
     * @param array $attribute
     *
     * @return mixed
     */
    public function addCategory(array $attribute)
    {
        $attribute['slug'] = Str::slug($attribute['name']);
        if (!isset($attribute['position'])) {
            $position = $this->getCategoryPosition($attribute['section_id']);
            $attribute['position'] = (int)$position + 1;
        }
        return $this->add($attribute);
    }

    /**
     * @return array|static[]
     */
    public function getCategories()
    {
        return $this->getConnection('slave')
            ->orderByRaw('section_id, position ASC')->get();
    }

    /**
     * @param $sectionId
     *
     * @return array|static[]
     */
    public function getCategoryFromSection($sectionId)
    {
        return $this->getConnection('slave')
            ->where('section_id', $sectionId)->orderBy('position', 'ASC')
            ->get();
    }

    /**
     * @param $slug
     *
     * @return mixed|static
     */
    public function getFromSlug($slug)
    {
        return $this->getConnection('slave')
            ->where('slug', strtolower($slug))->first();
    }

    /**
     * @param $sectionId
     *
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
        $sql = "SELECT cat.*, COUNT(recipe.category_id) AS recipe_count"
            . " FROM categories AS cat"
            . " LEFT JOIN recipes AS recipe ON recipe.category_id = cat.category_id"
            . " GROUP BY cat.category_id"
            . " ORDER BY slug ASC";
        return $this->db->connection('slave')->select($sql);
    }
}
