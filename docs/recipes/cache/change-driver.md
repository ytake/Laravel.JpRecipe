---
Title:    処理中にCacheのドライバーを変更する
Topics:   cache, configuration
Position: 25
---

{problem}
処理中に利用するCacheのドライバーを変更して、複数のドライバーを使い分けたい
{/problem}

{solution}
`Cache::setDefaultDriver()`メソッドを利用します

```php
\Cache::setDefaultDriver('memcached');
```

リクエスト内の処理で、  
この指定以降でCacheに利用されるドライバーはmemcachedとなります
{/solution}

{discussion}
あくまでもリクエスト内でのみ動的にドライバーを変更する事が出来ます

下記の様にコールした場合、

```php
// デフォルトで指定されているドライバーを取得
\Cache::getDefaultDriver();
// これ以降のCache処理はapcを指定
\Cache::setDefaultDriver('redis');
// 'redis'が返却され、以降はredisが利用されます
\Cache::getDefaultDriver();
// redisにcacheデータがインサートされます
\Cache::put('testing', ['testing'], 240);
```

{/discussion}

{credit}
Author:Yuuki Takezawa
{/credit}
