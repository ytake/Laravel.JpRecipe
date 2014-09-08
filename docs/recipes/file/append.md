---
Title:    ファイルへの末尾に文字列等のコンテンツを追加する
Topics:   file system
Position: 8
---

{problem}
ファイルの _末尾に_ にコンテンツを追加したい
{/problem}

{solution}
`File::append()` メソッドを利用します

```php
$bytesWritten = \File::append($filename, $content);
if ($bytesWritten === false) {
    die("ファイルに書き込めませんでした");
}
```

既存のファイルの末尾にコンテンツを追加します  
ファイルが存在しない場合、内容は `$content` になります
{/solution}

{discussion}
戻り値を確認して下さい

ファイル書き込みで問題がある場合は `false` が返却されます
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
