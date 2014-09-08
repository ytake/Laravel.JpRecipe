---
Title:    認証ユーザーを設定する
Topics:   -
Position: 35
---

{problem}
現在アクセスしているユーザーを認証で利用したい
{/problem}

{solution}
`Auth::setUser()`メソッドを利用します

```php
$user = \User::find($user_id);
\Auth::setUser($user);
```
{/solution}

{discussion}
このメソッドを利用してもログイン状態にはなりません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
