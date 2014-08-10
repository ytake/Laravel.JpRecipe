---
Title:    Redisの設定方法
Topics:   configuration, SQLite
Code:     -
Id:       118
Position: 3
---

{problem}
アプリケーションでRedisを利用したい

RedisはNoSQLとよばれるもので、RDBMSでは無いため、  
マイグレートやスキーマの定義は必要ありません。  
インストールも簡単で、すぐに利用ができます。  
{/problem}

{solution}
`app/config/database.php`で設定します。

```php
<?php
 'redis' => [
'cluster' => false,
'default' => [
'host' => '127.0.0.1',
'port' => 6379,
'database' => 0,
],
],
```
{/solution}
