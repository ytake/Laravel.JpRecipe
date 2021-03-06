<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class RecipeTags
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class RecipeTags extends Migration
{
    /** @var string  */
    protected $table = 'recipe_tags';

    use DownForeignKeyCheckTrait;

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        \Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('recipe_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->timestamp('created_at');
        });
    }
}
