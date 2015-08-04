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

/**
 * Class SectionRepository
 *
 * @package App\Repositories\Fluent
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Section extends AbstractFluent
{
    /** @var string */
    protected $table = 'sections';

    /** @var */
    protected $primary = 'section_id';

    /**
     * sections 取得
     * cache 240min
     *
     * @return array|static[]
     */
    public function getSections()
    {
        return $this->getConnection('slave')
            ->orderBy('position', 'ASC')
            ->get([
                'section_id',
                'name',
                'description',
                'position'
            ]);
    }
}
