---
Title:    キャッシュドライバーのインスタンスを取得する
Topics:   cache
Position: 11
---

{problem}
キャッシュドライバのインスタンスを取得したい
{/problem}

{solution}
`Cache::driver()` メソッドを利用します

デフォルトのドライバを取得する場合は引数を使わずにメソッドを使用します

```php
$driver = \Cache::driver();
```

デフォルトドライバーが作成されていない場合は、  
作成する前にインスタンスを返却します

他に、取得したいドライバの名前を指定する事が出来ます

```php
$driver = \Cache::driver('apc');
```

{/solution}

{discussion}
デフォルトでキャッシュドライバーは8つ用意されています

それらは:

* APC cache driver
* array cache driver
* database cache driver
* file cache driver
* Memcached cache driver
* Redis cache driver
* WinCache cache driver
* XCache cache driver

独自に実装したキャッシュドライバーも同様に取得する事が出来ます  
[[独自のキャッシュドライバーを利用する]].
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
