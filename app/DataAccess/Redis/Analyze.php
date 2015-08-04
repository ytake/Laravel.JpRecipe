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

use Illuminate\Redis\Database;

/**
 * Class Analyze
 *
 * @package App\DataAccess\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Analyze
{

    const SET_PREFIX = "recipe:";

    const SORTED_SET_PREFIX = "sorted_recipes";

    /** @var Database  */
    protected $redis;

    /**
     * @param Database $redis
     */
    public function __construct(Database $redis)
    {
        $this->redis = $redis;
    }

    /**
     * Redis cleanup function
     * 不要になったKeyを削除
     *
     * @return void
     */
    public function deleteDisableKey()
    {
        $redis = $this->redis->connection('default');
        $previous = date("Ymd", strtotime("- 1day", strtotime(date("Ymd"))));
        $result = $redis->keys(self::SET_PREFIX . "{$previous}*");
        if (count($result)) {
            $redis->pipeline(
                function ($pipe) use ($result) {
                    foreach ($result as $row) {
                        $pipe->del($row);
                    }
                }
            );
        }
    }
}
