<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Recipes
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Recipes extends Migration
{

    protected $table = "recipes";

    use DownForeignKeyCheckTrait;
    
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        \Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('recipe_id');
            $table->string('title')->unique();
            $table->integer('category_id')->unsigned();
            $table->text('problem');
            $table->text('solution');
            $table->text('discussion')->nullable();
            $table->text('credit')->nullable();
            $table->integer('position')->default(1);
            $table->nullableTimestamps();
            $table->index(['category_id', 'position', 'recipe_id'], 'RECIPE_INDEX');
        });
    }
}
