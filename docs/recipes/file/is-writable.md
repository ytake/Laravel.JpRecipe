---
Title:    ファイルまたはディレクトリが書き込み可能かどうかを確認する
Topics:   file system
Position: 17
---

{problem}
ファイルまたはディレクトリへの書き込み権限を確認したい
{/problem}

{solution}
`File::isWritable()` メソッドを利用します

```php
if (File::isWritable($filename)) {
    echo "{$filename}は書き込めます";
}
if (File::isWritable($dirname)) {
    echo "{$filename}は書き込めます";
}
```

ファイルまたはディレクトリが存在し、書き込み可能である場合には`true`が返却され、
書き込み不可の場合は`false`が返却されます
{/solution}

{discussion}
これはPHPの`is_writable()`のラッパー関数です
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
