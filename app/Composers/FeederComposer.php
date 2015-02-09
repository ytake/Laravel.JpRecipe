<?php
namespace App\Composers;

use App\Feed\Reader;

/**
 * Class FeederComposer
 * @package App\Composers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class FeederComposer
{

    /** @var Reader  */
    protected $reader;

    /**
     * @param Reader $reader
     */
    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }

    /**
     * @param $view
     * @return void
     */
    public function compose($view)
    {
        $url = \Config::get('recipe.packages_feed');
        if(\Cache::has("package_feeder:{$url}")) {
            $view->with('feeder', \Cache::get("package_feeder:{$url}"));
            return;
        }
        $data = $this->reader->read($url);
        \Cache::put("package_feeder:{$url}", $data, 120);
        $view->with('feeder', $data);
    }

} 