---
Title:    キャッシュのプレフィックスを取得する
Topics:   cache
Position: 13
---

{problem}
キャッシュのプレフィックスを確認したい

アプリケーションが使用するキャッシュキーの先頭に何らかのプレフィックスが付属しています  
利用されているプレフィックを確認してみましょう
{/problem}

{solution}
`Cache::getPrefix()`メソッドを利用します

```php
$prefix = \Cache::getPrefix();
```

これは設定ファイルから直接取得する場合と同じです

```php
$prefix = \Config::get('cache.prefix');
```

`app/config/cache.php`の`'prefix'`キーで指定する事が出来ます

```php
'prefix' => 'my-app',
```
{/solution}

{discussion}
プレフィックスを使用すると、キャッシュを共有することができます

`Memcached` や `Redis`を使用している場合は特に重要です  
キャッシュキーを一意にする事が出来ます  
他のアプリケーションから、このプレフィックを利用して値を取得して使用する事が出来ます

_`Cache::getPrefix()`とキャッシュドライバーの`getPrefix()`を混同しない様にして下さい_

同じ名前のメソッドが2つありますが、  
`Cache::getPrefix()`は常に設定ファイルから値を返却します  
`Cache::driver()->getPrefix()`はドライバーが構築した値を返却します
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
