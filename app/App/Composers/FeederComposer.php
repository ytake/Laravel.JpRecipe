<?php
namespace App\Composers;

use Zend\Feed\Exception\RuntimeException;

/**
 * Class FeederComposer
 * @package App\Composers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class FeederComposer
{

    /**
     * @param $view
     * @return void
     */
    public function compose($view)
    {
        $url = \Config::get('recipe.packages_feed');
        $data = [];
        if(\Cache::has("package_feeder:{$url}")) {
            $view->with('feeder', \Cache::get("package_feeder:{$url}"));
            return;
        }
        try {
            $feed = \Zend\Feed\Reader\Reader::import($url);
            if ($feed) {
                $i = 0;
                foreach ($feed as $entry) {
                    $edata = [
                        'title' => $entry->getTitle(),
                        'description' => $entry->getDescription(),
                        'dateModified' => $entry->getDateModified(),
                        'authors' => $entry->getAuthors(),
                        'link' => $entry->getLink(),
                        'content' => $entry->getContent()
                    ];
                    $data[] = (object) $edata;
                    $i++;
                    if($i == 5) {
                        break;
                    }
                }
            }
        } catch(RuntimeException $exception) {

        }
        \Cache::put("package_feeder:{$url}", $data, 60);
        $view->with('feeder', $data);
    }

} 