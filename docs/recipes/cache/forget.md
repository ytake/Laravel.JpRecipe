---
Title:    キャッシュからアイテムを削除する
Topics:   cache
Position: 20
---

{problem}
キャッシュからアイテムを削除したい
{/problem}

{solution}
`Cache::forget()`メソッドを利用します

```php
\Cache::forget($key);
```
{/solution}

{discussion}
とくにありません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
