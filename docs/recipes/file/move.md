---
Title:    ファイルを移動する
Topics:   file system
Position: 10
---

{problem}
ファイルを別のディレクトリに移動させたい
{/problem}

{solution}
`File::move()` メソッドを利用します

```php
if (!\File::move($oldfile, $newfile)) {
    die("Couldn't rename file");
}
```
{/solution}

{discussion}
これはPHPの`rename()`のラッパー関数です

別のディレクトリ、別のドライブにファイルを移動させたり、  
ファイルの名前を変更します
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
