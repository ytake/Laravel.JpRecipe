<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class RecipeTags
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class RecipeTags extends Migration
{

    protected $table = "recipe_tags";

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        \Schema::create($this->table, function($table) {
            $table->engine = 'InnoDB';
            $table->integer('recipe_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->foreign('recipe_id')->references('recipe_id')
                ->on('recipes')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('tag_id')->references('tag_id')
                    ->on('tags')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['recipe_id', 'tag_id'], 'RECIPE_TAG_UNIQUE');
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
