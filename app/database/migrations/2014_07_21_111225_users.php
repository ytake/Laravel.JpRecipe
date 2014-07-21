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
            $table->integer('github_id')->unique();
            $table->rememberToken();
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->index(['user_id', 'github_id'], 'USER_INDEX');
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
