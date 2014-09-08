---
Title:    Redisをインストールする
Topics:   installation, redis
Position: 12
---

{problem}
cacheやsessionを高速化させたい
{/problem}

{solution}
Redisをインストールします

```bash
$ sudo apt-get install -y redis-server
```
{/solution}

{discussion}
redisをcache等で利用するには設定をする必要があります

指定方法は[[キャッシュドライバーにRedisを利用する]]をご覧ください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
