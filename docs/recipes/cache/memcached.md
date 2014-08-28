---
Title:    キャッシュドライバーにmemcachedを利用する
Topics:   cache, configuration, memcached
Code:     -
Id:       94
Position: 4
---

{problem}
Laravelのキャッシュを高速化させたい

Laravelのキャッシュドライバーはデフォルトではファイルが選択されています
これを変更して処理速度を向上させてみましょう
{/problem}

{solution}
Memcachedキャッシュドライバーを利用します

`app/config/cache.php`ファイルのdriverを`'memcached'`に変更します

```php
'driver' => 'memcached',
```

複数のmemcachedサーバがあったり、
ローカル以外のmemcachedを利用している場合は、
同様に`app/config/cache.php`ファイルの **memcached** の内容も変更してください

```php
'memcached' => [
    [
        'host' => '127.0.0.1',
        'port' => 11211,
        'weight' => 100
    ],
],
```
{/solution}

{discussion}
Memcachedは、
無料で高性能な分散システムを構築出来ます
Memcachedがインストールされているか確認しましょう

インストール方法は [[Memcachedをインストールする]] レシピにあります
{/discussion}
