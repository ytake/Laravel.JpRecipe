<?php
namespace App\Tests\Commands;

use App\Commands\AddRecipeCommand;
use App\Repositories\Fluent\CategoryRepository;
use App\Repositories\Fluent\RecipeRepository;
use App\Tests\TestCase;

class AddRecipeCommandTest extends TestCase
{
    /** @var AddRecipeCommand  */
    protected $command;

    public function setUp()
    {
        $this->command = new AddRecipeCommand(new CategoryRepository, new RecipeRepository);
    }

} 