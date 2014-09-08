---
Title:    Cookieを使って認証されたかどうかを確認
Topics:   authentication
Position: 17
---

{problem}
何を使って認証されたかを知りたい

認証には二通りあることを理解しておいてください  
"remember me" cookieを使って認証したかどうかを取得する事ができます
{/problem}

{solution}
`Auth::viaRemember()`メソッドを利用します

```php
if (\Auth::viaRemember()) {
    echo "remember me cookieを使ってログイン";
} else {
    echo "HTTPリクエストを使ってログイン";
}
```
{/solution}

{discussion}
特にありません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
