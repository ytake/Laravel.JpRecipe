---
Title:    ディレクトリ内のすべてのディレクトリを取得する
Topics:   file system
Position: 22
---

{problem}
ディレクトリ内のすべてのディレクトリを一覧で取得したい
{/problem}

{solution}
`File::directories()` メソッドを利用します

```php
$list = \File::directories('/test');
echo "Test ディレクトリ内に ", count($list), "ディレクトリあります";
```
{/solution}

{discussion}
文字列の配列を返却します

返却される文字列は、サブディレクトリへのフルパスです

ディレクトリにサブディレクトリが含まれていない場合は空の配列が返されます

引数でディレクトリが指定されていない場合は、`InvalidArgumentException`がスローされます
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
