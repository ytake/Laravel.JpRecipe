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
    public function __construct(CategoryRepositoryInterface $category, RecipeRepositoryInterface $recipe)
    {
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
                    // insert
                    $this->scanFile($scan, $files, $category);
                }
            }
        }
    }

    /**
     * @param array $dir
     * @param $files
     * @param \stdClass $category
     * @return void
     */
    protected function scanFile(array $dir, $files, \stdClass $category)
    {

        foreach ($dir as $value) {

            if ($value != "." &&  $value != "..") {
                $file = \File::get("{$files}/{$value}");
                $problem = $this->getParseContents('problem', $file);
                $solution = $this->getParseContents('solution', $file);
                $discussion = $this->getParseContents('discussion', $file);
                $title = $this->getParseHeader('title', $file);
                $position = $this->getParseHeader('position', $file);

                if($problem && $solution && $discussion && $title) {
                    $array = [
                        'problem' => trim($problem),
                        'category_id' => $category->category_id,
                        'solution' => trim($this->convertGfm($solution)),
                        'discussion' => trim($this->convertGfm($discussion)),
                        'title' => trim($title),
                        'position' => trim($position)
                    ];
                    try {
                        // @todo
                        $this->recipe->addRecipe($array);
                        $this->info("added : {$files}/{$value}");
                    } catch(\Illuminate\Database\QueryException $e) {
                        $this->comment("Duplicate : {$files}/{$value}");
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
        $preg = preg_match_all("/\{$tag\}(.*?)\{\/$tag\}/us", $file, $matches);
        if($preg) {
            return end($matches)[0];
        }
        return false;
    }

    /**
     * @access private
     * @param $element
     * @param $file
     * @return bool
     */
    private function getParseHeader($element, $file)
    {
        $preg = preg_match_all("/---(.*?)---/us", $file, $matches);
        if($preg) {
            $explode = explode("\n", end($matches)[0]);
            if($explode) {
                foreach($explode as $row) {
                    switch ($element)
                    {
                        case 'title':
                            if(strpos($row, 'Title:') === 0) {
                                return trim(str_replace('Title:', '', $row));
                            }
                            break;
                        case 'position':
                            if(strpos($row, 'Position:') === 0) {
                                return trim(str_replace('Position:', '', $row));
                            }
                            break;
                    }
                }
            }
            return false;
        }
        return false;
    }

    /**
     * @param string $string
     * @return string
     */
    protected function convertGfm($string)
    {
        $pattern = [
            "/{((?!\/)(php|js|bash|java|css|html))}/us",
            "/{(\/.*?)}/us",
            "/\[\[((.*?))\]\]/us"
        ];
        $replace = [
            "```$1",
            "```",
            "[$1](" . action('home.recipe') . ")"
        ];
        return preg_replace($pattern, $replace, $string);
    }
}