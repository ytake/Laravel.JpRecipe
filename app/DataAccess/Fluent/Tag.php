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
 * Class Tag
 *
 * @package App\DataAccess\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Tag extends AbstractFluent
{
    /** @var string */
    protected $table = 'tags';

    /** @var string */
    protected $primary = 'tag_id';

    /**
     * @param $name
     *
     * @return mixed|static
     */
    public function getTagFromName($name)
    {
        return $this->getConnection('slave')
            ->where('tag_name', $name)->first();
    }
}
