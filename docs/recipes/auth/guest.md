---
Title:    ユーザーがログインしていないかどうかを確認
Topics:   authentication
Code:     Auth::guest()
Id:       81
Position: 15
---

{problem}
ユーザーがログインしていない状態かどうかを確認したい

認証されたユーザーはセッションで保持されている事を知っている事が前提になります。  
現在アクセスしているユーザーがログイン済みかどうかを確認しましょう
{/problem}

{solution}
`Auth::guest()`を利用します

`Auth::guest()`メソッドは、true か falseのみを返却します

```php
if (Auth::guest()) {
    echo "ログインしていません、ログインしてください！";
}
```
{/solution}

{discussion}
`Auth::guest()`と`Auth::check()`は全く逆の利用方法になります

以下は使用例です。
```php
public function guest()
{
    return ! $this->check();
}
```

[[Determining if the Current User is Authenticated]]を参考にしてください。

#### 'auth'フィルターでこのメソッドを利用する場合

Laravelは **auth** フィルターを `app/filters.php`で用意しています。

```php
Route::filter('auth', function() {
    if (Auth::guest()) {
        return Redirect::guest('login');
    }
});
```

これは、ルーターで'auth'フィルタが指定されている場合に、  
ログイン認証済みのユーザーアクセスはそのまま通過し、  
未ログインユーザーの場合は、ルーターで指定された'login'にリダイレクトされます。  
'login'を任意のURIなどに変更して利用してください
{/discussion}
