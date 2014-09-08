---
Title:    キャッシュされている認証済みユーザーの取得
Topics:   -
Position: 34
---

{problem}
キャッシュされた認証済みユーザーの情報を取得したい
{/problem}

{solution}
`Auth::getUser()`メソッドを利用します

```php
$user = Auth::getUser();
if(!$user) {
    echo "現在アクセスしているユーザーは認証されていません";
}
```
{/solution}

{discussion}
`Auth::getUser()` と `Auth::user()`は少々異なります

`Auth::user()`はキャッシュされたデータが無い場合、  
またはセッション情報が無い場合は"remember me"Cookieを利用して認証を試みます

`Auth::getUser()`は、認証済みのユーザーかどうかだけを返却します
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
