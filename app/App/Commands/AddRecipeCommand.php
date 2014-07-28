<?php
namespace App\Commands;

use App\Repositories\RecipeRepositoryInterface;
use Illuminate\Console\Command;
use App\Repositories\CategoryRepositoryInterface;

/**
 * Class AddRecipeCommand
 * @package App\Commands
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AddRecipeCommand extends Command
{

    /**
     * The console command name.
     * @var string
     */
    protected $name = 'jp-recipe:add';

    /**
     * The console command description.
     * @var string
     */
    protected $description = "recipes to database";

    /** @var CategoryRepositoryInterface */
    protected $category;

    /** @var RecipeRepositoryInterface */
    protected $recipe;

    /**
     * @param CategoryRepositoryInterface $category
     * @param RecipeRepositoryInterface $recipe
     */
    public function __construct(
        CategoryRepositoryInterface $category,
        RecipeRepositoryInterface $recipe
    ) {
        parent::__construct();
        $this->category = $category;
        $this->recipe = $recipe;
    }

    /**
     * Execute the console command.
     * @return void
     */
    public function fire()
    {
        $path = \Config::get('recipe.document_path');
        $categories = scandir($path);
        foreach($categories as $directory) {

            $category = $this->category->getCategoryFromSlug($directory);
            if($category) {
                $files = "{$path}/{$directory}";
                if($scan = scandir($files)) {

                    foreach ($scan as $value) {
                        if ($value != "." &&  $value != "..") {
                            $file = \File::get("{$path}/{$directory}/{$value}");
                            $problem = $this->getParseContents('problem', $file);
                            $solution = $this->getParseContents('solution', $file);
                            $discussion = $this->getParseContents('discussion', $file);
                            $title = $this->getParseHeaderTitle($file);
                            if($problem && $solution && $discussion && $title) {
                                $array = [
                                    'problem' => trim($problem),
                                    'category_id' => $category->category_id,
                                    // @todo
                                    'solution' => str_replace(['{php}', '{/php}'], ['```php', '```'], trim($solution)),
                                    'discussion' => trim($discussion),
                                    'title' => trim($title)
                                ];
                                try {
                                    $this->recipe->addRecipe($array);
                                    $this->info("added : {$path}/{$directory}/{$value}");
                                } catch(\Illuminate\Database\QueryException $e) {
                                    $this->comment("Duplicate : {$path}/{$directory}/{$value}");
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * @access private
     * @param $tag
     * @param $file
     * @return mixed
     */
    private function getParseContents($tag, $file)
    {
        $preg = preg_match_all("/\{$tag\}(.*?)\{\/$tag\}/s", $file, $matches);
        if($preg) {
            return end($matches)[0];
        }
        return false;
    }

    /**
     * @access private
     * @param $file
     * @return bool
     */
    private function getParseHeaderTitle($file)
    {
        $preg = preg_match_all("/---(.*?)---/s", $file, $matches);
        if($preg) {
            $explode = explode("\n", end($matches)[0]);
            if($explode) {
                foreach($explode as $row) {
                    if(strpos($row, 'Title:') === 0) {
                        return trim(str_replace('Title:', '', $row));
                    }
                }
            }
            return false;
        }
        return false;
    }
}