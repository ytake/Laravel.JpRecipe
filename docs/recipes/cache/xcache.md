---
Title:    キャッシュドライバーにXCacheを利用する
Topics:   cache, configuration, XCache
Code:     -
Id:       100
Position: 8
---

{problem}
Laravelのキャッシュを高速化させたい

Laravelのキャッシュドライバーはデフォルトではファイルが選択されています
これを変更して処理速度を向上させてみましょう
{/problem}

{solution}
XCacheキャッシュドライバーを利用します

`app/config/cache.php`ファイルのdriverを`'xcache'`に変更します

```php
'driver' => 'xcache',
```
{/solution}

{discussion}
'xcache'ドライバーを利用する前に、
'xcache'がインストールされているかを確認して下さい
詳細は [[XCacheをインストールする]] レシピにあります

Laravelで利用するには、
[[XCacheをインストールする]] レシピにもある通り、
`xcache.var_size`の設定を変更して下さい
{/discussion}
