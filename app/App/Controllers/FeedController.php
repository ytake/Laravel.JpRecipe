<?php
namespace App\Controllers;

use App\Presenter\FeedInterface;
use Illuminate\Routing\Controller;
use App\Repositories\RecipeRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;

/**
 * Class FeedController
 * @package App\Controllers\Api
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class FeedController extends Controller
{

    /** @var FeedInterface */
    protected $feed;

    /** @var RecipeRepositoryInterface */
    protected $recipe;

    /**
     * @param FeedInterface $feed
     * @param RecipeRepositoryInterface $recipe
     */
    public function __construct(FeedInterface $feed, RecipeRepositoryInterface $recipe)
    {
        $this->feed = $feed;
        $this->recipe = $recipe;
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function getIndex($format = 'atom')
    {
        $this->feed->setHeaders($format);
        $feed = $this->feed->getFeeder();
        $recipes = $this->recipe->getLatestRecipe(25);
        if($recipes) {
            foreach ($recipes as $recipe) {
                $entry = $feed->createEntry();
                $entry->setTitle($recipe->title);
                $entry->setLink(route('home.recipe', ['one' => $recipe->recipe_id]));
                $entry->setDateModified(strtotime($recipe->updated_at));
                $entry->setDateCreated(strtotime($recipe->created_at));
                $entry->setDescription(\Markdown::render($recipe->problem));
                $entry->setContent(\Markdown::render($recipe->solution));
                $feed->addEntry($entry);
            }
        }
        return $this->feed->render();
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function getSiteMap()
    {
        $dom = new \DOMDocument();
        $dom->version = "1.0";
        $dom->encoding = "UTF-8";
        $urlset = $dom->appendChild($dom->createElement('urlset'));
        $urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $urlset->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $url = $urlset->appendChild($dom->createElement('url'));
        $url->appendChild($dom->createElement('loc', url()));
        $url->appendChild($dom->createElement('priority', '1.0'));
        $url->appendChild($dom->createElement('changefreq', 'always'));
        $recipes = $this->recipe->all();
        if($recipes) {
            foreach($recipes as $recipe) {
                $url = $urlset->appendChild($dom->createElement('url'));
                $url->appendChild($dom->createElement('loc', route('home.recipe', [$recipe->recipe_id])));
                $url->appendChild($dom->createElement('lastmod', $recipe->updated_at));
                $url->appendChild($dom->createElement('priority', '0.5'));
                $url->appendChild($dom->createElement('changefreq', 'never'));
            }
        }
        $dom->formatOutput = true;
        $content = $dom->saveXML();
        return \Response::make($content, 200, ["Content-Type" => "text/xml; charset=utf-8"]);
    }
}