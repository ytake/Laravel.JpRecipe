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

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        \Schema::create($this->table, function($table) {
            $table->engine = 'InnoDB';
            $table->increments('recipe_id');
            $table->string('title')->unique();
            $table->integer('category_id')->unsigned();
            $table->text('problem');
            $table->text('solution');
            $table->text('discussion');
            $table->integer('position')->default(1);
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->index(['category_id', 'position', 'recipe_id'], 'RECIPE_INDEX');
            $table->foreign('category_id')->references('category_id')
                ->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        \Schema::drop($this->table);
    }

}
