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
     * @param int $from
     * @param int $to
     * @return array|mixed
     */
    public function getSortedCount($from = 0, $to = 4)
    {
        $array = [];
        try {
            $result = \Redis::connection('default')
                ->zrevrange(self::SORTED_SET_PREFIX, $from, $to, 'withscores');
            if(count($result)) {
                foreach($result as $key => $value) {
                    $array[] = (object) [
                        'recipe_id' => str_replace(self::SET_PREFIX, '', $key),
                        'views' => $value
                    ];
                }
                return $array;
            }

        } catch (\Predis\Connection\ConnectionException $e) {

        }
        return [];
    }

    /**
     * Redis cleanup function
     * 不要になったKeyを削除
     * @return void
     */
    public function getDisableKey()
    {
        $redis = \Redis::connection('default');
        $previous = date("Ymd", strtotime("- 1day", strtotime(date("Ymd"))));
        $result = $redis->keys(self::SET_PREFIX . "{$previous}*");
        if(count($result)) {
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