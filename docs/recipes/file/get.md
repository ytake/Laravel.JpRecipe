---
Title:    ファイルの内容を取得する
Topics:   file system
Position: 2
---

{problem}
ファイルの内容を取得したい
{/problem}

{solution}
`File::get()` メソッドを利用します

```php
$contents = \File::get($filename);
```
{/solution}

{discussion}
ファイルが見つからない場合は例外が返却されます

具体的には `Illuminate\Filesystem\FileNotFoundException` がスローされます

try/catchを利用して、エラーを捕捉する様にしましょう

```php
try {
    $contents = \File::get($filename);
} catch (\Illuminate\Filesystem\FileNotFoundException $exception) {
    die("ファイルがありません");
}
```
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
