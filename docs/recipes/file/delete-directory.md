---
Title:    再帰的にディレクトリを削除する
Topics:   file system
Position: 25
---

{problem}
再帰的にすべてのファイル、すべてのサブディレクトリを削除したい
{/problem}

{solution}
`File::deleteDirectory()` メソッドを利用します

```php
$success = \File::deleteDirectory($directory);
```

ディレクトリが存在しない場合は、`false`が返却され、  
それ以外の場合は`true`が返却されます

トップレベルのディレクトリを保持したい場合は、第二引数に`true`を指定して下さい

```php
$success = \File::deleteDirectory($directory, true);
```

`$directory`を残して、その配下が全て削除されます
{/solution}

{discussion}
このメソッドは失敗する場合があります

実際にどれかのファイルが削除されていない場合でも、`true`が返却されます

指定したトップレベルのディレクトリも全て削除する場合(第二引数が`false`の場合)、  
確実にディレクトリが削除されたかどうかを確認する場合は、  
`File::exists()`メソッドを利用してください  
[[ファイルが存在するかどうかを確認する]]
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
