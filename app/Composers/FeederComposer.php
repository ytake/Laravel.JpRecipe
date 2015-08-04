<?php

namespace App\Composers;

use App\Feed\Reader;
use Illuminate\Contracts\Config\Repository;
use Illuminate\View\View;

/**
 * Class FeederComposer
 *
 * @package App\Composers
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class FeederComposer
{
    /** @var Repository */
    protected $config;

    /** @var Reader */
    protected $reader;

    /**
     * @param Reader     $reader
     * @param Repository $config
     */
    public function __construct(Reader $reader, Repository $config)
    {
        $this->reader = $reader;
        $this->config = $config;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $url = $this->config->get('recipe.packages_feed');
        if (\Cache::has("package_feeder:{$url}")) {
            $view->with('feeder', \Cache::get("package_feeder:{$url}"));

            return;
        }
        $data = $this->reader->read($url);
        \Cache::put("package_feeder:{$url}", $data, 120);
        $view->with('feeder', $data);
    }
}
