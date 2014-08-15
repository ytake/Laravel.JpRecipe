---
Title:    アプリケーションからログアウトさせる
Topics:   -
Code:     Auth::logout(), Event::listen(), Log::info()
Id:       224
Position: 29
---

{problem}
ユーザーをログアウトさせたい
{/problem}

{solution}
`Auth::logout()`メソッドを利用します

```php
\Auth::logout();
```

これは、メモリからユーザーが消去され、セッションで保持されていたユーザーオブジェクト等もクリアされます。
{/solution}

{discussion}
これは`auth.logout`を発生させます

次の様にログアウトイベントを検知する事ができます
```php
\Event::listen('auth.logout', function($user) {
    $message = sprintf('User #%d logged out', $user->id);
    \Log::info($message);
});
```
{/discussion}
