<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class AccessControls
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AccessControls extends Migration
{

    protected $table = "access_controls";

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        \Schema::create($this->table, function($table) {
            $table->engine = 'InnoDB';
            $table->string('name')->unique();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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