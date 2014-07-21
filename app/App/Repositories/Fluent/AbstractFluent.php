<?php
namespace App\Repositories\Fluent;

use Carbon\Carbon;

/**
 * Class AbstractFluent
 * @package App\Repositories\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
abstract class AbstractFluent implements FluentInterface
{

    /** @var string  query cache key */
    protected $cacheKey;

    /** @var string  table name */
    protected $table;

    /** @var string  primary key */
    protected $primary = 'id';

    /** @var string  */
    protected $master = 'master';

    /** @var string  */
    protected $slave = 'slave';

    /**
     * add
     * @param array $attributes
     * @return mixed
     */
    public function add(array $attributes)
    {
        $attributes['created_at'] = Carbon::now()->toDateTimeString();
        return \DB::connection($this->master)->table($this->table)->insertGetId($attributes);
    }

    /**
     * get all
     * @param array $columns
     * @return \stdClass
     */
    public function all(array $columns = ['*'])
    {
        return \DB::connection($this->slave)->table($this->table)->get($columns);
    }

    /**
     * @param $id
     * @param array $columns
     * @param int $lifeTime
     * @return mixed|static
     */
    public function find($id, array $columns = ['*'], $lifeTime = 120)
    {
        if(\Cache::has($this->cacheKey . $id)) {
            return \Cache::get($this->cacheKey . $id);
        }
        $result = \DB::connection($this->slave)->table($this->table)
            ->where($this->primary, $id)->first($columns);
        if($result) {
            \Cache::put($this->cacheKey . $id, $result, $lifeTime);
            return $result;
        }
        return null;
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        // cache forget
        \Cache::forget($this->cacheKey . $id);
        return \DB::connection($this->master)->table($this->table)
            ->where($this->primary, $id)->delete();
    }

    /**
     * @param $id
     * @param array $attributes
     * @return int
     */
    public function update($id, array $attributes)
    {
        // cache forget
        \Cache::forget($this->cacheKey . $id);
        return \DB::connection($this->master)->table($this->table)
            ->where($this->primary, $id)->update($attributes);
    }

    /**
     * get \Illuminate\Database\Query\Builder instance
     * @param string $connection  specified database connection / 接続するデータベースを指定します。
     * @return \Illuminate\Database\Query\Builder
     */
    public function getConnection($connection)
    {
        return \DB::connection($connection)->table($this->table);
    }

}