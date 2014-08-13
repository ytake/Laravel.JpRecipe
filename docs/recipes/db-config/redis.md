---
Title:    Redisの設定方法
Topics:   configuration, SQLite
Code:     -
Id:       118
Position: 3
---

{problem}
アプリケーションでRedisを利用したい

RedisはNoSQLとよばれるもので、RDBMSでは無いため、  
マイグレートやスキーマの定義は必要ありません。  
インストールも簡単で、すぐに利用ができます。  
{/problem}

{solution}
`app/config/database.php`で設定します。

```php
<?php
'redis' => [
    'cluster' => false,
    'default' => [
        'host' => '127.0.0.1',
        'port' => 6379,
        'database' => 0,
    ],
]
```

Redisでサポートされている機能については公式サイトを参考にして下さい  
[Redis](http://redis.io/)
{/solution}

{discussion}
Redisを利用する場合に、デフォルトでは特にドライバーをインストールする必要はありません。  
Laravelでは、`predis`ライブラリを利用していて、  
接続等はすべてこのライブラリがカバーしてくれます。  
`phpredis`を利用したい方は、エクステンションをインストールして下さい。  

クラスター環境を利用する場合は、  
'cluster' => true,'として、お使いの環境に合わせてください。

デフォルトでは利用するデータベース番号は0になっていますが、  
任意のデータベース番号を指定して下さい。  
predisではこの他にも多くのオプションが利用できます。  

Redisでパスワードを利用する場合は、次の様に配列キーを追加して指定してください。
```php
'default' => [
    'host' => '127.0.0.1',
    'port' => 6379,
    'database' => 0,
    'password' => 'laravel-recipes'
],
```
`AUTH`コマンドが実行される様になります。  

タイムアウトを指定したい場合も同様に指定します。

```php
'default' => [
    'host' => '127.0.0.1',
    'port' => 6379,
    'database' => 0,
    'timeout' => 300
],
```
{/discussion}
