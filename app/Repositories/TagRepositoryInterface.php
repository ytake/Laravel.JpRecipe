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

namespace App\Repositories;

/**
 * Interface TagRepositoryInterface
 *
 * @package App\Repositories
 */
interface TagRepositoryInterface
{

    /**
     * tags 取得
     *
     * @return \stdClass
     */
    public function getTags();

    /**
     * @param integer $tagId
     * @return \stdClass
     */
    public function getTag($tagId);

    /**
     * @param string  $name
     * @param integer $lifeTime
     * @return mixed
     */
    public function getTagFromName($name, $lifeTime = 240);

    /**
     * @param array $attribute
     * @return \stdClass
     */
    public function addTag(array $attribute);
}
