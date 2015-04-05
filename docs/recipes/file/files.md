---
Title:    ディレクトリ内のすべてのファイルを一覧で取得する
Topics:   file system
Position: 20
---

{problem}
ディレクトリ内のすべてのファイルを一覧で取得したい
{/problem}

{solution}
`File::files()` メソッドを利用します

```php
$files = \File::files();
```
{/solution}

{discussion}
このメソッドは常に配列が返却されます

配列はファイルのみが返却されます

ディレクトリ内にファイルが見つからない、またはディレクトリが存在しない場合は空の配列が返却されます
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
