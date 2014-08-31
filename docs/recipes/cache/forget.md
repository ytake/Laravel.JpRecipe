---
Title:    キャッシュからアイテムを削除する
Topics:   cache
Code:     Cache::forget()
Id:       272
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
