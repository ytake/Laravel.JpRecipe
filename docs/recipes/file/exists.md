---
Title:    ファイルが存在するかどうかを確認する
Topics:   file system
Position: 1
---

{problem}
ファイルが存在するかそうかを確認したい

通常はPHPの`file_exists()`メソッドを利用しますが、Laravel流で利用してみましょう
{/problem}

{solution}
`File::exists()` メソッドを利用します

```php
if (\File::exists($myfile)) {
    echo "ファイルがあります！";
}
```
{/solution}

{discussion}
このメソッドは内部で `file_exists()` をコールしています

ファサードを使用すると、テストで必要なときに簡単にメソッドをモックすることができます  
[[ファサードをモックする]] を参照して下さい
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
