---
Title:    Cookieやsessionを使わないユーザーIDを使った認証
Topics:   -
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
これは`Auth::once()`と同等です

しかし、実際には認証はしません  
指定した`$user_id`が有効な値であれば、現在のセッションでのみ有効なログインとして扱います

[[Cookieやsessionを使わない認証]]も参考にしてください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
