---
Title:    リクエストからクッキーを取得する
Topics:   cookies
Code:     Cookie::get(), Request::cookie()
Id:       49
Position: 2
---

{problem}
アプリケーションに送信されたクッキーの値を確認したい。

PHPでは、スーパーグローバルの`$_COOKIE`を利用して取得しますが、  
Laravel流に利用してみましょう
{/problem}

{solution}
`Cookie::get()`を使います

```php
// $val cookieが存在しない場合はnull
$val = \Cookie::get('COOKIE_NAME');

// 存在しない場合に返却する値を設定します
$name = \Cookie::get('NAME', 'Unknown');
echo "Hello $name";
```
{/solution}

{discussion}
これは`Request::cookie()`と同じです

実際には、`Cookie::get()`は`Request::cookie()`のラッパーです
{/discussion}
