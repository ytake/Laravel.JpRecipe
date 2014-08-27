---
Title:    Redisをインストールする
Topics:   installation, redis
Code:     -
Id:       95
Position: 12
---

{problem}
cacheやsessionでより早い速度が必要
{/problem}

{solution}
Redisをインストールします

```bash
$ sudo apt-get install -y redis-server
```
{/solution}

{discussion}
redisをcache等で利用するには設定をする必要があります

指定方法は[[Setting up the Redis Cache Driver]]をご覧ください
{/discussion}
