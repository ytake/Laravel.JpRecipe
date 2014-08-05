---
Title:    404エラーを登録
Topics:   -
Code:     App::missing()
Id:       203
Position: 21
---

{problem}
404エラーを任意のものに変更したい
{/problem}

{solution}
`App::missing()`メソッドを利用します

一般的な設置場所は`app/start/global.php`ですが、早期に実行される場所であればどこにでも設置出来ます  
サービスプロバイダなどでも構いません

```php
App::missing(function($exception) {
    // not-found.blade.phpなどを使って任意のメッセージを表示したりします
    return View::make('not-found')->withMessage($exception->getMessage());
});
```
{/solution}

{discussion}
処理が終了すると`Response`を返却します。

適切にハンドラなどを設置していない場合は、  
アクセスしたユーザーなどにそのままエラーを返却します。  
Laravelのエラー画面などがそのまま表示される事になる場合もありますので、適切に処理を記述しましょう。

場合によっては、ここでエラー内容をログとして出力して、  
他のハンドラで処理をする等、色々なパターンで利用出来ます。  
要望にあった内容で実装してみてください。  
{/discussion}
