---
Title:    Basic認証を利用した認証処理
Topics:   -
Position: 22
---

{problem}
ログインなどの認証処理に、Basic認証を利用したい
{/problem}

{solution}
`Auth::basic()`メソッドを利用します

引数等を指定せずにBasic認証を行う場合は、'email'を使って認証します  
これは、`Auth::basic()`の引数でデフォルトとして指定されています

```php
$result = Auth::basic();
if ($result) {
    throw new \Exception('invalid credentials');
}
```

`'email'`ではなく、任意のフィールドを指定する場合は、第一引数で指定する事ができます  
下記の例は、`username`を指定した例です

```php
$result = Auth::basic('username');
if ($result) {
    throw new \Exception('invalid credentials');
}
```
他にもリクエストの値を直接含める事も可能です

```php
$result = Auth::basic('email', $request);
```

ただしくない認証情報が渡された場合は、  
_401 Invalid Credentials_ エラーが返却されます
{/solution}

{discussion}
認証処理は、`auth.attempt`イベントとして登録されています

認証が成功した場合は、`auth.login`イベントが発生します

それぞれのイベントは、`\Event::listen()`を利用することで、  
任意の処理等を実装する事ができます。
```php
Event::listen('auth.login', function($user) {
    // 任意の処理
});
```
`auth.basic`フィルターを使って、`Auth::basic()`を実装しましょう
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
