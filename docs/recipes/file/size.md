---
Title:    ファイルのサイズを取得する
Topics:   file system
Position: 14
---

{problem}
ファイルのサイズを取得したい
{/problem}

{solution}
`File::size()` メソッドを利用します

```php
$bytes = \File::size($filename);
```
{/solution}

{discussion}
エラーには気をつけてください

存在しないファイルや、アクセス権を持っていないファイルのタイプを取得しようとすると、  
エラーが発生します
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
