---
Title:    MySQLドライバーの設定方法
Topics:   configuration
Code:     -
Id:       58
Position: 1
---

{problem}
アプリケーションでMySQLをデータベースとして利用したい

アプリケーションにMySQLを選択するというのは、ごく一般的なものです。  
{/problem}

{solution}
`app/config/database.php`で設定します。

```php
<?php
return [
    'fetch' => PDO::FETCH_CLASS,
    'default' => 'mysql',
    'connections' => [
        'mysql' => [
            'driver'    => 'mysql',
            'host'      => 'your-hostname',
            'database'  => 'your-dbname',
            'username'  => 'your-username',
            'password'  => 'your-password',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
    ],
];
```
{/solution}

{discussion}
LaravelはMySQLをデフォルトのデータベースとしていますので、  
Laravelを新規にインストールした場合には必ずデフォルトがMySQLになっています。

設定する上で重要なポイントを紹介します。

`connections[]`配列内の`mysql`キーは接続先の識別子として利用します。  
名前が何であっても、正しく指定すればいくつものデータベースを接続して利用する事が出来ます。

この設定は、`mysql`という名前で接続します

'host':接続先のホスト名が`localhost`として設定されていますが、
接続先のデータベースホスト名などを記述して下さい。  

'database':利用するデータベース名を指定してください。
当然ですが、データベース名などはLaravelではなく`MySQL`で作成するものです。

'username', 'password': アクセス時に必要なアカウント、パスワード名を指定してください。  
不明な場合は`MySQL`で確認しましょう。

#### See also

まだ`MySQL`がインストールされていない場合は[[Installing MySQL]]レシピも参考にしてください.
{/discussion}
