<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Sections
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Sections extends Migration
{
    /** @var string */
    protected $table = "sections";

    use DownForeignKeyCheckTrait;

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        \Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('section_id');
            $table->string('name')->unique();
            $table->string('description');
            $table->integer('position')->default(1);
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->index(['section_id', 'position'], 'SECTION_INDEX');
        });
    }
}
