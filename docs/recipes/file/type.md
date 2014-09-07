---
Title:    ファイルのタイプを取得する
Topics:   file system
Position: 13
---

{problem}
ファイルのタイプが何であるかを知りたい
{/problem}

{solution}
`File::type()` メソッドを利用します

```php
echo \File::type($filename);
```

通常は`"file"` または `"dir"` が返却されます
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
