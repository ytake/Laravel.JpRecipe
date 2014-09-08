---
Title:    キャッシュからすべての項目を削除する
Topics:   cache
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

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
