---
Title:    クロージャを利用したルーティングの作成
Topics:   route, laravel4
Position: 1
---

{problem}
コントローラーを利用せずにルーターのみで完結させたい
{/problem}

{solution}
`app/routes.php`でルーティングを登録します

`Route`ファサードを利用してHTTPメソッドを指定できるという事を覚えておいて下さい

Laravelの`Route`は以下のHTTPメソッドを指定する事ができます

1. `GET` / `HEAD`: 指定されたURIのリソースを取り出す
2. `POST`: GETとは反対にクライアントがサーバにデータを送信する
3. `PUT`: 指定したURIにリソースを保存する
4. `PATCH`: サーバはHTTPヘッダのみ返す
5. `DELETE`: 指定したURIのリソースを削除する
6. `OPTIONS`: サーバを調査する
[Hypertext Transfer Protocol](http://ja.wikipedia.org/wiki/Hypertext_Transfer_Protocol)

上記のどれでも問わずに利用出来る様にする場合は、  
`any`を指定します

利用するHTTPメソッドを決めたら次は、URLパスを決めましょう  
パスの次は、そのURLで行う処理をクロージャ内で記述していきます

以下の例は、GETを利用しURLパスを `/home` として、"hello"を出力する例です

```php
\Route::get('home', function () {

    return 'hello';
});
```

他のHTTPメソッドの場合も同様です

```php
// POST
\Route::post('home', function () {

    return 'hello';
});

// DELETE
\Route::delete('home', function () {

    return 'hello';
});
```

Bladeテンプレートを用いる場合は、コントローラーや他のクラスでの利用方法と同じ様に  
`View`ファサードを利用します

```php
\Route::get('home', function () {

    return \View::make('hello');
});
```

`View`ファサード以外にも、Laravelで用意されているAPIや、  
ユーザが作成したファサード等も利用可能です
{/solution}

{discussion}
作成したルートは`artisan`コマンドで一覧で確認する事が出来ます  
下記のコマンドをコンソールから実行してみましょう

```bash
$ php artisan route
```

詳しくは [[ルートを一覧で見たい]] をご覧ください
{/discussion}

{credit}
Author:Yuuki Takezawa
{/credit}
