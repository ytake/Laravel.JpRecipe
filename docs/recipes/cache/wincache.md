---
Title:    キャッシュドライバーにWinCacheを利用する
Topics:   cache, configuration
Position: 7
---

{problem}
Windows環境でPHPを動かしているので、WinCacheを使いたい
{/problem}

{solution}
設定して利用する事が出来ます

`app/config/cache.php`ファイルのdriverを`'wincache'`に変更します

```php
'driver' => 'wincache',
```
{/solution}

{discussion}
WinCacheは、FastCGI拡張機能を使用しているIISサーバーが必要です

詳しいセットアップ手順は下記webサイト等を参考にして下さい

* [PHP Documentation Page](http://www.php.net/manual/en/wincache.requirements.php)
* [WinCache PECL Page](http://pecl.php.net/package/wincache)
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
