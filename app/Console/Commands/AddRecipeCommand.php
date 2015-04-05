<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use App\Repositories\TagRepositoryInterface;
use App\Repositories\RecipeRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\RecipeTagRepositoryInterface;

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

    /** @var TagRepositoryInterface */
    protected $tag;

    /** @var RecipeTagRepositoryInterface  */
    protected $recipeTag;

    /**
     * @param CategoryRepositoryInterface $category
     * @param RecipeRepositoryInterface $recipe
     * @param TagRepositoryInterface $tag
     * @param RecipeTagRepositoryInterface $recipeTag
     */
    public function __construct(
        CategoryRepositoryInterface $category,
        RecipeRepositoryInterface $recipe,
        TagRepositoryInterface $tag,
        RecipeTagRepositoryInterface $recipeTag
    ) {
        parent::__construct();
        $this->category = $category;
        $this->recipe = $recipe;
        $this->tag = $tag;
        $this->recipeTag = $recipeTag;
    }

    /**
     * Execute the console command.
     * @return void
     */
    public function fire()
    {
        $path = config('recipe.document_path');
        $categories = scandir($path);
        foreach($categories as $directory) {

            $category = $this->category->getCategoryFromSlug($directory);
            if($category) {
                $files = "{$path}/{$directory}";
                if($scan = scandir($files)) {
                    // insert
                    $this->addRecipes($scan, $files, $category);
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
    protected function addRecipes(array $dir, $files, \stdClass $category)
    {

        foreach ($dir as $value) {

            if ($value != "." &&  $value != "..") {
                $file = \File::get("{$files}/{$value}");
                $problem = $this->getParseContents('problem', $file);
                $solution = $this->getParseContents('solution', $file);
                $discussion = $this->getParseContents('discussion', $file);
                $credit = $this->getParseContents('credit', $file);
                $title = $this->getParseHeader('title', $file);
                $position = $this->getParseHeader('position', $file);
                $topics = $this->getParseHeader('topics', $file);

                if($problem && $solution && $discussion && $title) {
                    $array = [
                        'problem' => trim($problem),
                        'category_id' => $category->category_id,
                        'solution' => trim($this->convertGfm($solution)),
                        'discussion' => trim($this->convertGfm($discussion)),
                        'credit' => trim($this->convertGfm($credit)),
                        'title' => trim($title),
                        'position' => trim($position)
                    ];
                    try {
                        // new recipes
                        $recipeId = $this->recipe->addRecipe($array);
                        $this->addTags($recipeId, $topics);
                        $this->info("added : {$files}/{$value}");
                    } catch(QueryException $e) {
                        // update recipes
                        $recipe = $this->recipe->getRecipeFromTitle(trim($title));
                        $this->recipe->updateRecipe($recipe->recipe_id, [
                                'problem' => trim($problem),
                                'category_id' => $category->category_id,
                                'solution' => trim($this->convertGfm($solution)),
                                'discussion' => trim($this->convertGfm($discussion)),
                                'position' => trim($position)
                            ]
                        );
                        $this->recipeTag->deleteRecipeTags($recipe->recipe_id);
                        $this->addTags($recipe->recipe_id, $topics);
                        $this->comment("Updated : recipe:{$title} : {$files}/{$value}");
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
                        case 'topics':
                            if(strpos($row, 'Topics:') === 0) {
                                return trim(str_replace('Topics:', '', $row));
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
            "/{((?!\/)(php|js|bash|java|css|html|text))}/us",
            "/{(\/.*?)}/us",
        ];
        $replace = [
            "```$1",
            "```",
        ];
        return preg_replace($pattern, $replace, $string);
    }

    /**
     * @param $recipeId
     * @param string $string
     */
    protected function addTags($recipeId, $string = '-')
    {
        if($string != '-' && $string != '') {
            $tags = explode(',', $string);
            foreach($tags as $tag) {
                try {
                    $tagId = $this->tag->addTag(['tag_name' => trim($tag)]);
                } catch(QueryException $e) {
                    $tag = $this->tag->getTagFromName(trim($tag));
                    $tagId = $tag->tag_id;
                }
                try {
                    $this->recipeTag->addRecipeTag(['tag_id' => $tagId, 'recipe_id' => $recipeId]);
                } catch(QueryException $e) {
                    // no process
                }
            }
        }
    }
}
