---
Title:    キャッシュドライバーにデータベースを利用する
Topics:   configuration
Position: 2
---

{problem}
複数のサーバ間などでキャッシュを共有して使えるようにしたい

複数のサーバでキャッシュを利用する場合に、ファイルキャッシュでは他のサーバから利用する事は出来ません  
データベースを介して複数のサーバ間でキャッシュを共有してみましょう
{/problem}

{solution}
データベースキャッシュドライバーを利用します

まず `app/config/cache.php` のドライバーを変更します

```php
'driver' => 'database',
```

次に、キャッシュを保存するテーブルをデータベースに作成します

```text
$ mysql -u username -p
mysql> use mydatabase
mysql> create table cache (`key` varchar(255) not null, value text not null)
    -> expiration int not null, unique key (`key`));
mysql> exit
```
{/solution}

{discussion}
このレシピでは、すでにデータベースがインストール済みで、  
設定が済んでいるものと仮定しています

導入が済んでいない場合は  
[[MySQLをインストールする]] 、[[MySQLドライバーの設定方法]] をご覧ください

キャッシュに利用する接続先とテーブルを変更することができます  
`app/config/cache.php`で設定を変更します

```php
'connection' => null,
'table' => 'cache',
```

`app/config/database.php`で接続先が'mydb'、  
キャッシュのテーブルが'mycache'の場合は、  
`app/config/cache.php`で次の様に指定します

```php
'connection' => 'mydb',
'table' => 'mycache',
```

#### スキーマビルダーを使用してキャッシュテーブルを構築

Laravelのスキーマビルダーを利用して構築する場合は、次の様なコードになります

```php
Schema::create('cache', function($table)
{
	  $table->string('key')->unique();
  	$table->text('value');
  	$table->integer('expiration');
});
```

#### データベースドライバの制限

ファイルキャッシュドライバーと同様に`Cache::increment()`、`Cache::decrement()`は利用できません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
