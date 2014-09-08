---
Title:    手動でログインする
Topics:   -
Position: 26
---

{problem}
手動でログインさせたい
{/problem}

{solution}
`Auth::login()`メソッドを利用します

これは、認証処理をパスして、現在のセッションにログインとしてユーザーを保持します

```php
$user = User::find($user_id);
Auth::login($user);
```

ログインを記憶させる様にするには、第二引数に"remember me"Cookieを使用する様に  
`true`を指定します

```php
\Auth::login($user, true);
```
{/solution}

{discussion}
`Auth::attempt()`は自動でこれらの処理をおこないます

`Auth::attempt()`は、認証が成功した場合に、内部で`Auth::login()`を利用します

細かい認証処理が必要ではない時でも、`Auth::attempt()`を利用するのをおすすめします  
ただし、テスト時等では複雑な処理は必要ない為、  
`Auth::login()`を利用すると良いでしょう

これらは、`auth.login`イベントを発生させます
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
