---
Title:    パスがディレクトリかどうかを確認する
Topics:   file system
Position: 16
---

{problem}
ファイルパスがディレクトリかどうか確認したい
{/problem}

{solution}
`File::isDirectory()` メソッドを利用します

```php
if (\File::isDirectory($filename)) {
    echo "ディレクトリです";
}
```

指定したディレクトリが存在する場合は `true`が返却され、
存在しない場合は `false`が返却されます
{/solution}

{discussion}
これはPHPの`is_dir()`のラッパー関数です
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
