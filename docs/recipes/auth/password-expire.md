---
Title:    パスワードリマインダーの有効期限を変更
Topics:   authentication, configuration
Code:     -
Id:       77
Position: 11
---

{problem}
デフォルトのパスワード有効時間を1時間から任意に変更したい
{/problem}

{solution}
`app/config/auth.php`ファイルで指定します

```php
'reminder' => [
    'expire' => 60,
],
```
期限を60として変更されます
{/solution}

{discussion}
有効期限は、セキュリティ関連の機能です  

期限時間を短くする事で、セキュリティの強化にも繋がります
{/discussion}
