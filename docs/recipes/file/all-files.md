---
Title:    ディレクトリから再帰的にファイルを取得する
Topics:   file system, SplFileInfo
Position: 21
---

{problem}
ファイルシステムから再帰的にすべてのファイルを取得したい
{/problem}

{solution}
`File::allFiles()` メソッドを利用します

```php
$files = \File::allFiles($directory);
foreach ($files as $file) {
    echo (string) $file;
}
```
{/solution}

{discussion}
メソッドは `SplFileInfo` オブジェクトの配列を返します

具体的には、PHPの`SplFileInfo`クラスから派生した`Symfony\Component\Finder\SplFileInfo`オブジェクトが返却されます

ディレクトリが存在しない場合は、`InvalidArgumentException`がスローされます
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
