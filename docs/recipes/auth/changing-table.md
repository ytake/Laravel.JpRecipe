---
Title:    認証で利用するテーブルを変更する
Topics:   authentication, configuration
Position: 9
---

{problem}
アプリケーションで認証に利用するテーブルは **users** ではなく他のものを利用したい

認証ドライバを **database** で利用していて、  
Laravelデフォルトの`users`テーブル以外のものを指定したい
{/problem}

{solution}
`app/config/auth.php`のテーブル項目を変更しましょう

```php
'table' => 'administrators',
```

この例は、利用するテーブルを **administrators** に変更した例です
{/solution}

{discussion}
テーブル名を変更して、  
且つソースコードに変更を加えたくない場合は、  
Laravelが認証で必要とするカラムがある事を忘れないで下さい

認証で必要とされるカラムはいくつかありますが、  
プライマリに`id`、  
パスワードには`password`が必要であり、  
その他にユーザー情報を持たせるカラム等がありますが、  
`email`か`username`カラムを用意して下さい

[[資格情報を使って認証する]] で述べた様に下記の様なカラムを用意するとスムーズです
```php
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        //
        Schema::create('your_user_adminTable', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('username', 32);
            $table->string('email', 320);
            $table->string('remember_token', 64);
            $table->string('password', 64);
            $table->timestamps();
            $table->index(['id', 'username', 'password'], 'USER_INDEX');
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
        Schema::drop('your_user_adminTable');
    }
}

```
これ以外にも、  
独自のカラムなどの場合でも、簡単に認証を実装する事が可能です
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
