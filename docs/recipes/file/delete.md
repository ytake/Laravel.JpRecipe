---
Title:    ファイルを削除する
Topics:   file system
Position: 9
---

{problem}
ファイルシステム上のファイルを削除したい

一般的にはPHPの`unlink()`を利用しますが、これをLaravel流に利用してみましょう
{/problem}

{solution}
`File::delete()` メソッドを利用します

```php
// ファイルを1つ指定して削除します
\File::delete($filename);

// ファイルを複数指定して削除します
\File::delete($file1, $file2, $file3);

// ファイルを配列で指定して削除します
\File::delete([$file1, $file2]);
```
{/solution}

{discussion}
エラーは無視されます

ファイルの削除に問題がある場合にエラーはすべて無視されます  
ファイルが削除されたかどうかを確実に確認する場合には、  
`File::exists()`メソッドを利用して下さい  
[[ファイルが存在するかどうかを確認する]]
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
