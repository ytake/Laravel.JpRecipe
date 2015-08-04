<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Categories
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Categories extends Migration
{
    /** @var string  */
    protected $table = "categories";

    use DownForeignKeyCheckTrait;

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        \Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('category_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->string('slug')->unique('slug', 'CATEGORY_UNIQUE');
            $table->string('name');
            $table->string('description');
            $table->integer('position')->default(1);
            $table->nullableTimestamps();
            $table->index(['slug', 'section_id', 'category_id', 'position'], 'CATEGORY_INDEX');
        });
    }
}
