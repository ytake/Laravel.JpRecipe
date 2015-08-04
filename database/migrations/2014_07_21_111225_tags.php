<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Tags
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Tags extends Migration
{
    /** @var string */
    protected $table = "tags";

    use DownForeignKeyCheckTrait;

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        \Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('tag_id')->unsigned();
            $table->string('tag_name')->unique();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }
}
