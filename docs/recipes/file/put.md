---
Title:    文字列等のコンテンツをファイルに書き込む
Topics:   file system
Position: 6
---

{problem}
ファイルの作成または内容を置換したい
{/problem}

{solution}
`File::put()` メソッドを利用します

```php
$bytes_written = \File::put($file, $contents);
if ($bytes_written === false) {
    die("ファイルに書き込めません");
}
```
{/solution}

{discussion}
これは`file_put_contents()`のラッパー関数です
[file_put_contents](http://php.net/manual/ja/function.file-put-contents.php)
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
