---
Title:    ディレクトリをコピーする
Topics:   file system
Code:     File::copyDirectory()
Id:       148
Position: 24
---

{problem}
別の場所にディレクトリ全体をコピーしたい

再起的にコピーする事も可能です、実際にコピーしてみましょう
{/problem}

{solution}
`File::copyDirectory()` メソッドを利用します

```php
$success = \File::copyDirectory($sourceDir, $destinationDir);
```

すべてのファイルやディレクトリがコピーされた場合に`true`が返却されます

コピー先にディレクトリが存在しない場合は作成されます
また必要に応じて、再帰的に作成されます
{/solution}

{discussion}
オプションの第三引数があります

`File::copyDirectory()`メソッドは
ファイルをコピーするディレクトリをスキャンするためにPHPの `FilesystemIterator`クラスを使用しています
`FilesystemIterator`は、第二引数にフラグを指定する事ができます
`File::copyDirectory()`の第三引数に指定すると、
`FilesystemIterator`のコンストラクタに渡されます
デフォルトではSKIP_DOTS定数が利用されています

_ドットで始まるファイルはコピーされません_

[FilesystemIterator クラス](http://jp1.php.net/manual/ja/class.filesystemiterator.php)
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
