---
Title:    ファイル拡張子を取得する
Topics:   file system
Position: 12
---

{problem}
ファイル拡張子を取得したい
{/problem}

{solution}
`File::extension()` メソッドを利用します

```php
$extension = \File::extension($filename);
```

拡張子がない場合は空の文字列が返されます  
通常はファイル名の最後のピリオド _以降の_ 全ての文字列が返されます
{/solution}

{discussion}
特にありません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
