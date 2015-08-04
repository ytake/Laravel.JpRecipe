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

namespace App\DataAccess\Cache;

/**
 * Interface Cacheable
 *
 * @package App\DataAccess\Cache
 */
interface Cacheable
{
    /**
     * @param $key
     * @return mixed
     */
    public function get($key);

    /**
     * @param      $key
     * @param      $value
     * @param null $minutes
     * @return mixed
     */
    public function put($key, $value, $minutes = null);

    /**
     * @param     $currentPage
     * @param     $perPage
     * @param     $total
     * @param     $items
     * @param     $key
     * @param int $minutes
     * @return \StdClass
     */
    public function putPaginateCache(
        $currentPage,
        $perPage,
        $total,
        $items,
        $key,
        $minutes = 10
    );

    /**
     * @param $key
     * @return mixed
     */
    public function has($key);

    /**
     * @param $key
     * @return mixed
     */
    public function forget($key);

    /**
     * @return void
     */
    public function flush();
}
