---
Title:    キャッシュドライバーにAPCを利用する
Topics:   apc, cache, configuration
Code:     -
Id:       92
Position: 3
---

{problem}
Laravelのキャッシュを高速化させたい

Laravelのキャッシュドライバーはデフォルトではファイルが選択されています
これを変更して処理速度を向上させてみましょう
{/problem}

{solution}
APCキャッシュドライバーを利用します

`app/config/cache.php`ファイルのdriverを`'apc'`に変更します

```php
'driver' => 'apc',
```

これだけです
{/solution}

{discussion}
APCがインストールされているか確認しましょう

インストール方法は [[APCをインストールする]] レシピにあります

`apc.php`を使ってAPCのキャッシュを監視する事ができます
通常このファイルは`/usr/share/doc/php5-apcu`等のディレクトリにあります
キャッシュ統計を表示するにはwebアクセス可能なpublicなディレクトリに設置して、
`http://yourapp/apc.php`にアクセスして確認します
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
