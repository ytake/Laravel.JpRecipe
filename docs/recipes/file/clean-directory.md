---
Title:    ディレクトリ内のすべてのファイルとフォルダを空にする
Topics:   file system
Position: 26
---

{problem}
指定したディレクトリを残して、その中身をすべて削除したい
{/problem}

{solution}
`File::cleanDirectory()` メソッドを利用します

```php
$success = \File::cleanDirectory($directory);
```

ディレクトリが存在しない場合は、`false`が返却され、  
それ以外の場合は`true`が返却されます
{/solution}

{discussion}
これは`File::deleteDirectory()`メソッドのラッパー関数です

詳細は [[再帰的にディレクトリを削除する]] をご覧ください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
