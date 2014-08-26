---
Title:    暗号化モードを変更する
Topics:   encryption
Code:     Config::setMode()
Id:       109
Position: 5
---

{problem}
暗号化のモードを変更したい
{/problem}

{solution}
`Crypt::setMode()`を利用します

```php
\Crypt::setMode($mode);
```
{/solution}

{discussion}
このモードは、`Crypt::encrypt()`と`Crypt::decrypt()`に利用されます。

ただし、このメソッドをコールした場合に有効になるのは、
現在のリクエスト処理の間のみです

モードのリストは次の通りです:

* **"ecb"** - 電子ブックや、ランダムデータなどに使用するのに適しています
* **"cbc"** - ファイルを暗号化するのに特に適しています
* **"cfb"** - 1バイト毎に暗号化しなければならない場合、ストリームのバイトを暗号化する場合等に適しています
* **"ofb"** - 出力フィードバック(8ビット) 安全では無い為、お勧めしません
* **"nofb"** - 出力フィードバック(可変BIT) "ofb"に似ていますが、アルゴリズムのブロックサイズを変更できますので、より安全です
* **"stream"** - "WAKE"や "RC4"のようなストリームアルゴリズムのためのモード

Laravelではデフォルトで`cbc`を利用しています
{/discussion}
