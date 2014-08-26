---
Title:    configの値を取得する
Topics:   configuration
Code:     Config::get()
Id:       9
Position: 3
---

{problem}
configで設定した値にアクセスしたい
{/problem}

{solution}
`Config::get()`を利用します

configで指定した値を取得する事ができます

```php
$db_charset = \Config::get('database.connections.mysql.charset');
```

値が無い場合は、デフォルト値を設定する事ができます

```php
$default = \Config::get('non.existant.config.key', 'I am default');
```
{/solution}

{discussion}
Laravelはconfigの値は、リクエスト内でキャッシュして利用されます

最初にconfigの値を取得した場合、
全体の設定値がロードされ、それぞれの動作環境別のconfigとマージされます
([[実行環境の決定]]も参考にしてください)
これらは現在のリクエスト内のみで有効になります

リクエスト内の処理では、
configにアクセスする度に、ファイルをロードするという事はありません。
{/discussion}
