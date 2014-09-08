---
Title:    ファイルをコピーする
Topics:   file system
Position: 11
---

{problem}
別の場所にファイルをコピーしたい

一般的にはPHPの`copy()`を利用しますが、`File`ファサードを利用してみましょう
{/problem}

{solution}
`File::copy()` メソッドを利用します

```php
if (!\File::copy($file, $dest)) {
    die("ファイルをコピーできませんでした");
}
```
{/solution}

{discussion}
これは`copy()`のラッパー関数です  
[copy](http://php.net/manual/ja/function.copy.php)
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
