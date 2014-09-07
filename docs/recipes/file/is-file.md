---
Title:    ファイルパスがファイルかどうか確認する
Topics:   file system
Position: 18
---

{problem}
ファイルパスがファイルかどうか確認したい
{/problem}

{solution}
`File::isFile()` メソッドを利用する

```php
if (\File::isFile($filename)) {
    echo "ファイルです";
}
```

通常のファイルが存在する場合は `true`が返却され、
ファイルが存在しない場合は `false`が返却されます
{/solution}

{discussion}
これはPHPの`is_file()`のラッパー関数です
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
