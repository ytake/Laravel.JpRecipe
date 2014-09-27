---
Title:    処理中にCacheのドライバーを変更する
Topics:   cache, configuration
Position: 25
---

{problem}
処理中に利用するCacheのドライバーを変更して、複数のドライバーを使い分けたい
{/problem}

{solution}
`Cache::driver()`メソッドを利用します

```php
\Cache::driver('memcached')->get('key');
```
任意でドライバーを切り替える事が出来ます
{/solution}

{discussion}
特にありません
{/discussion}

{credit}
Author:Yuuki Takezawa
{/credit}
