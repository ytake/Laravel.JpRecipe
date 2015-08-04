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

use Carbon\Carbon;
use Illuminate\Database\DatabaseManager;

/**
 * Class AbstractFluent
 *
 * @package App\Repositories\Fluent
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
abstract class AbstractFluent implements FluentInterface
{
    /** @var string  table name */
    protected $table;

    /** @var string  primary key */
    protected $primary = 'id';

    /** @var string */
    protected $master = 'master';

    /** @var string */
    protected $slave = 'slave';

    /** @var DatabaseManager  */
    protected $db;

    /**
     * @param DatabaseManager $db
     */
    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }

    /**
     * add
     *
     * @param array $attributes
     * @return mixed
     */
    public function add(array $attributes)
    {
        $attributes['created_at'] = Carbon::now()->toDateTimeString();

        return $this->db->connection($this->master)->table($this->table)->insertGetId($attributes);
    }

    /**
     * get all
     *
     * @param array $columns
     * @return \stdClass
     */
    public function all(array $columns = ['*'])
    {
        return $this->db->connection($this->slave)->table($this->table)->get($columns);
    }

    /**
     * @param       $id
     * @param array $columns
     * @param int   $lifeTime
     * @return mixed|static
     */
    public function find($id, array $columns = ['*'], $lifeTime = 120)
    {
        return $this->db->connection($this->slave)->table($this->table)
            ->where($this->primary, $id)->first($columns);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        return $this->db->connection($this->master)->table($this->table)
            ->where($this->primary, $id)->delete();
    }

    /**
     * @param       $id
     * @param array $attributes
     * @return int
     */
    public function update($id, array $attributes)
    {
        // cache forget
        // \Cache::forget($this->cacheKey . $id);

        return $this->db->connection($this->master)->table($this->table)
            ->where($this->primary, $id)->update($attributes);
    }

    /**
     * get \Illuminate\Database\Query\Builder instance
     *
     * @param string $connection specified database connection / 接続するデータベースを指定します。
     * @return \Illuminate\Database\Query\Builder
     */
    public function getConnection($connection)
    {
        return $this->db->connection($connection)->table($this->table);
    }
}
