---
Title:    キャッシュドライバーにRedisを利用する
Topics:   cache, configuration, redis
Code:     -
Id:       96
Position: 5
---

{problem}
Laravelのキャッシュを高速化させたい

Laravelのキャッシュドライバーはデフォルトではファイルが選択されています
これを変更して処理速度を向上させてみましょう
{/problem}

{solution}
Redisキャッシュドライバーを利用します

`app/config/cache.php`ファイルのdriverを`'redis'`に変更します

```php
'driver' => 'redis',
```

複数のredisサーバがあったり、
ローカル以外のredisを利用している場合は、
同様に`app/config/database.php`ファイルの **redis** の内容も変更してください

```php
'redis' => [
    'cluster' => false,
    'default' => [
        'host'     => '127.0.0.1',
        'port'     => 6379,
        'database' => 0,
    ],
],
```
{/solution}

{discussion}
Redisは無料で使える高度なKVSです

Redisがインストールされているか確認しましょう

インストール方法は [[Redisをインストールする]] レシピにあります
{/discussion}
