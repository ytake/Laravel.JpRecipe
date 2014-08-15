---
Title:    ステートレスなBasic認証
Topics:   -
Code:     Auth::basic(), Auth::onceBasic()
Id:       218
Position: 23
---

{problem}
Basic認証を用いた認証を利用したい

cookieやsessionは利用しないで行いたい
{/problem}

{solution}
`Auth::onceBasic()`メソッドを利用します

`Auth::basic()`に変わって、ログイン状態にしますが、  
基本的には現在のリクエストのみで認証済みの状態になります

引数を指定せずに利用した場合は、`email`のフィールドを利用して認証します

```php
$result = \Auth::onceBasic();
if ($result) {
    throw new \Exception('invalid credentials');
}
```

`email`以外のフィールドを利用する場合は、第一引数でフィールド名を指定してください　

```php
$result = \Auth::onceBasic('username');
if ($result) {
    throw new \Exception('invalid credentials');
}
```

リクエストの値を直接含める事も可能です。

```php
$result = \Auth::onceBasic('email', $request);
```
ただしくない認証情報が渡された場合は、  
_401 Invalid Credentials_ エラーが返却されます。
{/solution}

{discussion}
APIの認証等で利用されるケースが多いと思います

`auth.api`フィルターとして実装する例です
```php
Route::filter('auth.api', function() {
    return Auth::onceBasic();
});
```
APIなどでこのフィルターを利用する場合、  
認証情報が正しくない場合は、_401 Invalid Credentials_ エラーを返却しますが、  
cookieやsessionで認証情報等を保存する事はありません
{/discussion}
