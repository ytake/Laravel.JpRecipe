---
Title:    ファイルへの先頭に文字列等のコンテンツを追加する
Topics:   file system
Position: 7
---

{problem}
ファイルの _先頭に_ にコンテンツを追加したい
{/problem}

{solution}
`File::prepend()` メソッドを利用します

```php
$bytesWritten = \File::prepend($filename, $content);
if ($bytesWritten === false) {
    die("ファイルに書き込めません");
}
```

既存のファイルの先頭にコンテンツを追加します  
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
