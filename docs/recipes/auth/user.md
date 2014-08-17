---
Title:    ログインしているユーザー情報を取得する
Topics:   authentication
Code:     Auth::user()
Id:       82
Position: 16
---

{problem}
現在アクセスしているユーザーの情報を取得したい
{/problem}

{solution}
`Auth::user()`メソッドを利用します

```php
$user = \Auth::user();
if ($user) {
    echo "Hello $user->name";
}
```
{/solution}

{discussion}
`Auth::user()`で取得できるものは何でしょうか？

このメソッドは下記の3つのうちどれかを返却します

ログインしていないユーザーは必ず `null` が返却されます

それ以外の戻り値は、認証ドライバー、設定に基づきます。  
**eloquent**ドライバーを指定している場合は、  
利用しているクラスのオブジェクトが返却されます

[[認証のドライバーを変更する]] にドライバー変更について、  
[[認証に使うモデルを変更する]] で利用するモデルの設定について記載しています。

**database**を利用している場合は、  
汎用的な`Illuminate\Auth\GenericUser`クラスのオブジェクトが返却されます。  

独自のドライバーを利用している場合は、  
実装したクラスのオブジェクト等が返却されます。  

**Auth カスタムドライバーの実装方法レシピは後日追加します**
{/discussion}
