<?php
namespace App\Repositories\Fluent;

use App\Repositories\AnalyticsRepositoryInterface;

/**
 * Class AnalyticsRepository
 * @package App\Repositories\Fluent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AnalyticsRepository implements AnalyticsRepositoryInterface
{

    const SET_PREFIX = "recipe:";

    const SORTED_SET_PREFIX = "sorted_recipes";

    /**
     * @param $recipeId
     * @return mixed|void
     */
    public function setCount($recipeId)
    {
        $address = \Request::server('REMOTE_ADDR');
        $host = gethostbyaddr($address);
        $date = date("Ymd");
        $key = self::SET_PREFIX . "{$date}:{$host}:{$address}:{$recipeId}";

        try {
            $redis = \Redis::connection('default');
            $result = $redis->get($key);
            if (!$result) {
                $redis->set($key, 1);
                $redis->zincrby(self::SORTED_SET_PREFIX, 1, self::SET_PREFIX . $recipeId);
            }
        } catch (\Predis\Connection\ConnectionException $e) {

        }
    }

    /**
     * @return mixed
     */
    public function getSortedCount()
    {
        return \Redis::connection('default')
            ->zrange(self::SORTED_SET_PREFIX, 0, -1, 'withscores');
    }
}