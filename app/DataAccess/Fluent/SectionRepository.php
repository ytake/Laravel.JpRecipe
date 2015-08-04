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

use App\Repositories\SectionRepositoryInterface;

/**
 * Class SectionRepository
 *
 * @package App\Repositories\Fluent
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class SectionRepository extends AbstractFluent implements SectionRepositoryInterface
{

    protected $cacheKey = "section:";

    /** @var string */
    protected $table = 'sections';

    /** @var */
    protected $primary = 'section_id';

    /**
     * sections 取得
     * cache 240min
     *
     * @return \stdClass
     */
    public function getSections()
    {
        return $this->getConnection('slave')
            ->orderBy('position', 'ASC')
            // ->remember(240, 'sections')
            ->get([
                'section_id',
                'name',
                'description',
                'position'
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
