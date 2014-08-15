---
Title:     ユーザーのIDを利用してログインする
Topics:   -
Code:     Auth::login(), Auth::loginUsingId()
Id:       222
Position: 27
---

{problem}
ユーザーIDを使ってログイン認証をしたい
{/problem}

{solution}
`Auth::loginUsingId()`メソッドを利用します

```php
$user = Auth::loginUsingId($user_id);
if (!$user) {
    throw new Exception('ログイン出来ませんでした');
}
```

`$user_id`からユーザーデータを検索してログイン状態としてセッションに保持し、  
ユーザーオブジェクトを返却しますが、  
ユーザーデータが存在しない場合は`null`が返却されます

"remember me"Cookieを使ってログインを記憶させる場合は次の様に、第二引数にtrueを指定してください
```php
Auth::loginUsingId($user_id, true);
```
{/solution}

{discussion}
基本的には`Auth::login()`と同じ動作をします。

このメソッドは、ユーザー検索後に`Auth::login()`を利用してログインさせます。
詳細は[[Manually Logging a User In]] を参照してください。
{/discussion}
