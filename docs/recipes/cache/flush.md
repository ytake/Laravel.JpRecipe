---
Title:    キャッシュからすべての項目を削除する
Topics:   cache
Code:     Cache::flush()
Id:       275
Position: 23
---

{problem}
キャッシュを完全に消したい
{/problem}

{solution}
`Cache::flush()`メソッドを利用します

```php
\Cache::flush();
```
{/solution}

{discussion}
キャッシュタグがサポートされているドライバーでは、
タグ基準で削除する事ができます

```php
\Cache::tags('widgets')->flush();
```
{/discussion}
