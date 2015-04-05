---
Title:    リマインダーコントローラの作成
Topics:   artisan, authentication, password reminders, Laravel4
Position: 21
---

{problem}
パスワードリマインダーを実装するためのコードを作成したい  
このレシピはLaravel4のみ対応です
{/problem}

{solution}
`php artisan auth:reminders-controller`コマンドが利用できます

```bash
$ php artisan auth:reminders-controller
```

以下のルートのハンドラを含み、`app/controllers`ディレクトリにファイルが生成されます

* GET /password/remind - パスワードリマインダービューを表示します
* POST /password/remind - パスワードリマインドのPOSTリクエストをハンドルします
* GET /password/reset/{token} - トークンのためのパスワードリセットビューを表示します
* POST /password/reset - パスワードリセットのリクエストをハンドルします

メソッドを利用し、生成されたファイルは`controllers/RemindersController.php`にあります

```php
<?php

class RemindersController extends Controller
{

  /**
   * Display the password reminder view.
   *
   * @return Response
   */
  public function getRemind()
  {
    return \View::make('password.remind');
  }

  /**
	 * パスワードリマインドのPOSTリクエストをハンドルします。
   *
   * @return Response
   */
  public function postRemind()
  {

    switch (\Password::remind(Input::only('email'))) {
      case \Password::INVALID_USER:
        return \Redirect::back()->with('error', \Lang::get($reason));

      case \Password::REMINDER_SENT:
        return \Redirect::back()->with('status', \Lang::get($reason));
    }
  }

  /**
	 * 与えられたトークンのパスワードリセットビューを表示します。
   *
   * @param  string  $token
   * @return Response
   */
  public function getReset($token = null)
  {
    if (is_null($token)) {
      \App::abort(404);
    }
    return \View::make('password.reset')->with('token', $token);
  }

  /**
	 * パスワードのリセットPOSTリクエストをハンドルします。
   *
   * @return Response
   */
  public function postReset()
  {
    $credentials = \Input::only([
      'email', 'password', 'password_confirmation', 'token'
    ]);

    $response = \Password::reset($credentials, function($user, $password) {
      $user->password = \Hash::make($password);
      $user->save();
    });

    switch ($response)
    {
      case \Password::INVALID_PASSWORD:
      case \Password::INVALID_TOKEN:
      case \Password::INVALID_USER:
        return \Redirect::back()->with('error', \Lang::get($response));

      case \Password::PASSWORD_RESET:
        return \Redirect::to('/');
    }
  }
}
```

上記のコントローラーをルートに設定するため  
`app/routes.php`ファイルに１行追加する必要があります。

```php
\Route::controller('password', 'RemindersController');
```
{/solution}

{discussion}
以下の変更が必要になります

`php artisan auth:reminders-controller`の利用はリマインダーを使い始めるには丁度良いですが、  
おそらくアプリケーションにいくつかの変更をしたくなると思います

名前空間を使用している場合、コマンド実行後にRemindersControllerを別の場所に移動し、  
適切に編集し、ルートの編集を行います

#### RESTfulな実装に変更

何かをハンドリングする方法よりコントローラのルーティングを利用したRESTfulな方法に変更をするとよいでしょう
以下の様に行います

* Change the `getRemind()` method to `index()`.
* Change the `postRemind()` method to `store()`.
* Change the `getReset()` method to `show()`.
* Change the `postReset()` method to `update()`.

これに応じてビューを更新する必要があります。
また、`app/routes.php`ファイルも同じく変更する必要があります

```php
Route::resource('password', 'RemindersController', [
    'only' => ['index', 'store', 'show', 'update']
]);
```
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27  
[Twitter](https://twitter.com/syossan27)  
[web](http://syossan.hateblo.jp/0)
{/credit}
