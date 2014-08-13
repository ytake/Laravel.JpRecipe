---
Title:    現在アクセスしているユーザーが認証済みかどうか確認する
Topics:   authentication
Code:     Auth::check()
Id:       80
Position: 14
---

{problem}
ユーザーがログインしているか確認したい

Laravelは自動的にSessionを利用して、認証ユーザーを維持しています  
現在アクセスしているユーザーがSessionが有効状態かどうかを知りたい場合の確認方法です
{/problem}

{solution}
`Auth::check()`を使いましょう

`Auth::check()`メソッドは、簡単に`true`か`false`を返却します

```php
if (Auth::check()) {
    echo "ログイン済みのユーザー！";
}
```
{/solution}

{discussion}
これらは通常、見えない所で実行します。

Sessionに userのidが含まれる場合は、  
データベースからユーザー情報を取得する為に、Laravelがチェックします。

取得できなかった場合、Laravelは`remember me`Cookieをチェックします。  
そして再び、それを利用してデータベースからの取得を試みます。  

データベースからユーザー情報が見つかった場合にのみ、`true`が返却されます。

シンプルで簡単に利用できますが、  
デフォルトの状態でそのまま利用する場合は、  
この処理が走るたびに都度データベースにアクセスする事を覚えておいて下さい。  
小さなシステムであれば、特に気にする必要はありませんが、  
大規模なシステムではボツルネックになる場合もあり得ます。

#### 'guest'フィルターはこのメソッドを利用しています

Laravelは`app/filters.php`内で、  
**guest** フィルターはデフォルトで実装されています。

```php
Route::filter('guest', function() {
    if (Auth::check()) {
        return Redirect::to('/');
    }
});
```

未ログインユーザーのみがアクセス可能であるルートにこのフィルターを指定した場合、  
すでにログインしている場合は、`/`、つまりトップページにリダイレクトされる事になります。
{/discussion}
