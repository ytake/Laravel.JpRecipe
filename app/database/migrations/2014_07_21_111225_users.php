<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Users
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Users extends Migration
{

    protected $table = "users";

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        \Schema::create($this->table, function($table) {
            $table->engine = 'InnoDB';
            $table->increments('user_id')->unsigned();
            $table->string('user_name');
            $table->integer('github_id');
            $table->rememberToken();
            $table->timestamps();
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
