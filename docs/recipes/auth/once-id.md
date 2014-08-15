---
Title:    Cookieやsessionを使わないユーザーIDを使った認証
Topics:   -
Code:     Auth::onceUsingId()
Id:       223
Position: 28
---

{problem}
ユーザーのIDを利用してログインさせたい

現在のリクエストのみで有効なログインをさせたい
{/problem}

{solution}
`Auth::onceUsingId()`メソッドを利用します

```php
$success = \Auth::onceUsingId($user_id);
if (!$success) {
    throw new \Exception('failed!');
}
```
{/solution}

{discussion}
これは`Auth::once()`と同等です。

しかし、実際には認証はしません。  
指定した`$user_id`が有効な値であれば、現在のセッションでのみ有効なログインとして扱います

[[Logging a User In Without Sessions or Cookies]]も参考にしてください
{/discussion}
