---
Title:    Cookieやsessionを使わない認証
Topics:   -
Code:     Auth::once()
Id:       215
Position: 20
---

{problem}
Cookieやsessionを使わずに認証をおこないたい
{/problem}

{solution}
`Auth::once()`メソッドを利用します

このメソッドは、資格情報を配列で指定します

```php
$logged_in = Auth::once(['username' => 'test', 'password' => 'test']);
if (!$logged_in) {
    throw new \Exception('not logged in');
}
```
{/solution}

{discussion}
現在のリクエストでのみ、_"ログイン"_ 状態となります

このメソッドはテストで利用すると便利です
{/discussion}
