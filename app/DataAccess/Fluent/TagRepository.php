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

use App\Repositories\TagRepositoryInterface;

/**
 * Class TagRepository
 *
 * @package App\Repositories\Fluent
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class TagRepository extends AbstractFluent implements TagRepositoryInterface
{

    /** @var string */
    protected $cacheKey = "tag:";

    /** @var string */
    protected $table = 'tags';

    /** @var string */
    protected $primary = 'tag_id';

    /**
     * tags 取得
     *
     * @return \stdClass
     */
    public function getTags()
    {
        return $this->all();
    }

    /**
     * @param integer $tagId
     * @return \stdClass
     */
    public function getTag($tagId)
    {
        return $this->find($tagId);
    }

    /**
     * @param string $name
     * @param int    $lifeTime
     * @return mixed|static
     */
    public function getTagFromName($name, $lifeTime = 240)
    {
        $key = "tag_name:{$name}";
        if (\Cache::has($key)) {
            return \Cache::get($key);
        }
        $result = $this->getConnection('slave')->where('tag_name', $name)->first();
        if ($result) {
            \Cache::put($key, $result, $lifeTime);
        }

        return $result;
    }

    /**
     * @param array $attribute
     * @return \stdClass
     */
    public function addTag(array $attribute)
    {
        return $this->add($attribute);
    }
}
