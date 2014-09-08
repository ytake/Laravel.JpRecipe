---
Title:    資格情報を使って認証する
Topics:   -
Position: 24
---

{problem}
ユーザーログインを実装したい

資格情報を使った通常のログインや、  
自動ログインなどを実装する事ができます
{/problem}

{solution}
`Auth::attempt()`メソッドを利用します

資格情報に必要な情報を用意しなければなりません
```php
// ユーザー名とパスワードを利用します
$success = Auth::attempt(['username' => 'me', 'password' => 'pass']);
```

`username = 'me' and 'password' == Hash::make('pass')`を利用してログインします  
成功した場合は`true`が返却され、ログインします  
失敗した場合は`false`が返却されます

第二引数を利用すると、cookieを利用した自動ログインを実装することができます  
デフォルトでは第二引数はfalseに指定されているため、  
自動ログインを実装する場合は`true`に変更してください

```php
$success = Auth::attempt($credentials, true);
```

`$success`で`true`が返却された時に、自動ログインのcookieがセットされます

第三引数を利用してログインを検証しないようにする事ができます  
デフォルトでは、`true`に指定されています

```php
$success = Auth::attempt($credentials, false, false);
```
{/solution}

{discussion}
デフォルトで利用する場合、  
`password`は、`\Hash::make('pass')`を使って認証処理が実行される事を覚えておいてください

データベースを使用して、Auth::attempt()を利用する場合は、  
次のようなテーブルを用意してください

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
        Schema::create('users', function(Blueprint $table)
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
        Schema::drop('users');
    }
}

```
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
