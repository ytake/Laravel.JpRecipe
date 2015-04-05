---
Title:    データベースの接続先を変更する
Topics:   database
Position: 1
---

{problem}
アプリケーションで複数のデータベースを利用したい

Laravelではシンプルなマスタースレーブ構成のデータベースに対して自動的にコネクションを振り分ける機能と、
明示的に接続先を指定する事が出来ます
{/problem}

{solution}
`app/config/database.php` または `app/config/{environment}/database.php` に接続したい環境を記述します

### read / write を自動で分けたい時
read/writeを明示的に指定する事無く、  
自動的に接続先を解決したいときは次の様に指定します  

```php
    'connections' => [
        'mysql' => [
            'read' => [
                'host' => '192.168.1.12',
            ],
            'write' => [
                'host' => '192.168.1.13'
            ],
            'driver'    => 'mysql',
            'database'  => 'database',
            'username'  => 'user',
            'password'  => 'password',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
    ]
```

writeにマスターを指定し、readにはスレーブを指定します  

データベースが一般的なスレーブマスター構成の場合にこれを利用すると、  
Laravelのデータベースコンポーネント内部で自動的に接続先が解決されます

`DB`ファサード、または`Eloquent`を使用する場合も、明示的に指定する必要はありません

### データベースの接続先を明示的に指定する
シンプルなマスタースレーブ構成以外にも、  
複数のデータベースを利用する事が多々あります  

例えば:
1. データ分散化の為に物理的にデータベースサーバが異なる場合  
2. マスター、スレーブそれぞれのユーザー、パスワードが異なる
3. アプリケーションでMySQL, PostgreSQL, SQL Serverなど複数のデータベースを利用する
などがあります

明示的に接続先を指定する場合は下記の様に記述します
```php
        'mysql_master' => [
            'driver'    => 'mysql',
            'host'      => '192.168.1.12',
            'database'  => 'database',
            'username'  => 'user',
            'password'  => 'password',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
        'mysql_slave' => [
            'driver'    => 'mysql',
            'host'      => '192.168.1.12',
            'database'  => 'database',
            'username'  => 'user',
            'password'  => 'password',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
```

データベースに接続する際に、下記の様に指定します
```php
// basic
\DB::connection('mysq_slave')->select(...);

// queryBuilder
\DB::connection('mysq_master')->table('table_name')->insert(...);
\DB::connection('mysq_slave')->table('table_name')->get();

// eloquent
User::on('mysql_slave')->find(1);
```

デフォルトでサポートしているそれぞれのデータベースドライバーは、  
接続先がMySQLやPostgreSQLであっても、意識する事無く複数の環境を一つのアプリケーションで利用できる様になります

`connection()`省略した場合は **default** に指定されている接続先が利用されます
{/solution}

{discussion}
データベースだけではなく、redisの接続先指定の方法もほど同様の方法です  
レプリケーションの設定方法等は各データベースのマニュアル等をご覧ください
{/discussion}

{credit}
Author:Yuuki Takezawa
{/credit}
