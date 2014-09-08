---
Title:    SQLiteドライバーの設定方法
Topics:   configuration, SQLite
Position: 2
---

{problem}
アプリケーションでSQLiteをデータベースとして利用したい

SQLiteは他のデータベースとは違い、"サーバを必要としない"ので、SQLiteの設定等は特に必要ありません  
{/problem}

{solution}
`app/config/database.php`で設定します。

```php
<?php
return [
    'default' => 'sqlite',
    'connections' => [
        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => __DIR__.'/../database/production.sqlite',
            'prefix'   => '',
        ],
    ],
];
```
{/solution}

{discussion}
PHPでSQLiteを利用する場合は、ドライバーがインストールされている必要があります  
ドライバーのインストール方法については [[SQLiteをインストールする]] を参照にしてください

上記の設定はサンプルです  
sqliteのファイルを任意のディレクトリ等に設置する場合は、  
''database' => __DIR__.'/../database/production.sqlite','を変更して下さい

```php
// app/storage内に置く場合
'database' => app_path() . '/storage/production.sqlite',
```

もちろん、新規でどこかにディレクトリを作成して設置しても構いません。

```bash
$ mkdir app/storage/databases
```

設定ファイルを変更する事を忘れないようにしましょう。

```php
'database' => app_path() . '/storage/databases/production.sqlite',
```
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
