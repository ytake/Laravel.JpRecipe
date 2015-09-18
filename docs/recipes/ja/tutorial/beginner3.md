Laravelのルーティングのみを利用した簡単な出力と、書き方について学びます。

# ルーティング
Laravelではルーティングにコントローラの存在は関係ありません。
これまでのphpフレームワークにはコントローラ、メソッドがURIを表現するものが多くありましたが、
そういった制限は特にありません。
URIと処理のマッピングは開発者が選択します。
このチュートリアルでは純粋なルーティングのみ絞って動作をさせてみますが、
その前に、HTTP通信のメソッドについて理解しておきましょう。

## HTTPメソッド
HTTPには以下の8つのメソッドがあります。

| メソッド | 種別 |
|------------|------------|
| GET | リソースの取得 |
| POST | リソースの作成、リソースへのデータの追加、その他の処理
| PUT | リソース更新、リソースの作成 |
| DELETE | リソースの削除 |
| HEAD | リソースのヘッダ取得 |
| OPTIONS | リソースがサポートしているメソッド取得 |
| TRACE | リクエストメッセージを返却 |
| CONNECT | プロキシ経由などのトンネル接続確立 |

[Hypertext Transfer Protocol -- HTTP/1.1](http://tools.ietf.org/html/rfc2616)
これに加え、PATCH（リソースの一部を更新）も利用します。
[PATCH Method for HTTP](http://tools.ietf.org/html/rfc5789)

このうちWebやAPI開発で主に利用するものは、GET、POST、PUT、PATCH、DELETEとなり、
リクエストはHTTPリクエスト、HTTPヘッダ、HTTPボディで構成されます。


例えばリクエストとしてGETメソッドはリソース取得のため、一般的にはブラウザ上では
```
http://homestead.app/123/?query=1&message=test
```
としてリクエストを送信し、ヘッダは次のようになります。

```
GET / HTTP/1.1
Host: homestead.app
User-Agent: curl/7.43.0
Accept: */*
```

興味がある方は書籍などを読んでみてください。
Laravelのルータでは、このHTTPリクエストとURIで実行する処理のマッピングを行います。
それぞれのHTTPメソッドの意味を抑えておきましょう（TRACEとCONNECTは利用しません）。

> 例えばリソース作成にGETメソッドを使わない、情報取得APIなどでいちいち/getUserの様なURIは作成しない、など

# ルーティングの基本的な書き方
Laravelのルーティングは、記述方法がいくつか提供されてます。
デフォルトでは**app/Http/routes.php**に記述します。

## GETリクエスト
GETリクエストを処理するには、`Routeファサード`か`getヘルパーメソッド`が利用できます。
URIを第一引数に記述して第二引数で処理を記述します。
以下の記述は **GETリクエストで /getにアクセスした** 処理となり、同一のものです。

```php
\Route::get('get', function () {
    return 'get';
});
```

```php
get('get', function () {
    return 'get';
});
```

ブラウザ上に*get*と表示されます。
htmlを記述して返却したり、静的なコンテンツを描画する場合など、
ルータのみで簡単に開発することができます。

## POSTリクエスト
POSTリクエストを処理するには、`Routeファサード`か`postヘルパーメソッド`が利用できます。
URIを第一引数に記述して第二引数で処理を記述します。
以下の記述は **POSTリクエストで /postにアクセスした** 処理となり、同一のものです。

```php
\Route::post('post', function () {
    return 'post';
});
```

```php
post('post', function () {
    return 'post';
});
```

ブラウザから/postにアクセスした場合に、**ステータスコード405 Method Not Allowed**が返却されることを確認してみましょう。
ブラウザ上ではエラーが表示されているはずです。
後述するPUT、PATCH、DELETEも同様です。

### 注意
curlコマンドで動作させることができますが、LaravelではHEAD、GET、OPTIONSメソッド以外では
CSRF（クロスサイトリクエストフォージェリ）対策が有効となっているためTokenMismatchExceptionがスローされます。

```bash
$ curl http://homestead.app/request --verbose --request POST
$ curl http://homestead.app/request --verbose --request PUT
$ curl http://homestead.app/request --verbose --request PATCH
$ curl http://homestead.app/request --verbose --request DELETE
```

簡単な動作を行う場合はこれを無効にしておきましょう。
app/Http/Controllers/Kernel.phpのmiddlewareプロパティの配列に記述されている、
`\App\Http\Middleware\VerifyCsrfToken::class`をコメントアウトします。
解除の方法は他にもありますが、ここではコメントアウトで構いません。
ですが、開発プロジェクトでは特別な理由がない限り無効にしてはいけません。
脆弱性を産むことになります。

## PUTリクエスト
PUTリクエストを処理するには、`Routeファサード`か`putヘルパーメソッド`が利用できます。
URIを第一引数に記述して第二引数で処理を記述します。
以下の記述は **PUTリクエストで /putにアクセスした** 処理となり、同一のものです。

```php
\Route::put('put', function () {
    return 'put';
});
```

```php
put('put', function () {
    return 'put';
});
```

## PATCHリクエスト
PATCHリクエストを処理するには、`Routeファサード`か`patchヘルパーメソッド`が利用できます。
URIを第一引数に記述して第二引数で処理を記述します。
以下の記述は **PATCHリクエストで /patchにアクセスした** 処理となり、同一のものです。

```php
\Route::patch('patch', function () {
    return 'patch';
});
```

```php
patch('patch', function () {
    return 'patch';
});
```

## DELETEリクエスト
DELETEリクエストを処理するには、`Routeファサード`か`deleteヘルパーメソッド`が利用できます。
URIを第一引数に記述して第二引数で処理を記述します。
以下の記述は **DELETEリクエストで /deleteにアクセスした** 処理となり、同一のものです。

```php
\Route::delete('delete', function () {
    return 'delete';
});
```

```php
delete('/delete', function () {
    return 'delete';
});
```

## OPTIONSリクエスト
OPTIONSリクエストを処理するには、`Routeファサード`のoptionsメソッドを利用します。
URIを第一引数に記述して第二引数で処理を記述します。
以下の記述は **OPTIONSリクエストで /optionsにアクセスした** 処理となります。

```php
\Route::options('options', function () {
    return 'options';
});
```

## 一つのURIに対して複数のHTTPメソッドを利用する
それぞれのHTTPメソッドを利用したルーティングについて紹介しました。
次に同一のURIに対してHTTPメソッドを変更してアクセスできるか確認してみましょう。
以下のコードは **/requestに複数のHTTPメソッドを利用する** 例です。

```php
\Route::get('request', function () {
    return 'get';
});
\Route::post('request', function () {
    return 'post';
});
\Route::put('request', function () {
    return 'put';
});
\Route::patch('request', function () {
    return 'patch';
});
\Route::delete('request', function () {
    return 'delete';
});
\Route::options('request', function () {
    return 'options';
});

```

## 一つのURIに対して複数のHTTPメソッドを利用する2
上記の他に、HTTPメソッドを配列で指定する方法もあります。

```php
\Route::match(['get', 'post', 'options'], 'match', function () {
    return 'match';
});
```

## すべてを許可
HTTPメソッドを問わず実行させることができます。
この場合はanyを利用します。

```php
\Route::any('any', function () {
    return 'any';
});
```

# ルート一覧
開発しているうちに、記述したルートを確認したいこともあるでしょう。
Laravelでは`Artisanコマンド`で確認できます。
次のコマンドをコンソールから入力してみましょう。

```bash
$ php artisan route:list
+--------+----------+---------+------+---------+------------+
| Domain | Method   | URI     | Name | Action  | Middleware |
+--------+----------+---------+------+---------+------------+
|        | DELETE   | request |      | Closure |            |
|        | OPTIONS  | request |      | Closure |            |
|        | PATCH    | request |      | Closure |            |
|        | PUT      | request |      | Closure |            |
|        | POST     | request |      | Closure |            |
|        | GET|HEAD | request |      | Closure |            |
+--------+----------+---------+------+---------+------------+
```

記述したルート一覧が表示されるはずです。
このコマンドはいくつかオプションがありますので、ルートがたくさんある場合に出力するルートを絞ったり、
表示順を変更したり、といったことが行えます。
利用できるオプションは次の通りです。

```
--method=（オプショナル HTTPメソッドでフィルタリングを行います）
--name=（オプショナル ルート名でフィルタリングを行います）
--path=（オプショナル URLパスでフィルタリングを行います）
-r、--reverse （オプショナル 表示順を逆にします）
--sort=（オプショナル host、method、uri、name、action、middlewareを指定してソートします）
```

# リクエストパラメータを受け取る
これまでにphpを使った開発を行ってきた方は、リクエストパラメータを取得するときに

```php
$post = $_POST['post'];
$get = $_GET['get'];
```

として利用したこともあるでしょう。

Laravelでは上記のようにリクエストパラメータを受け取らないようにしましょう。
アプリケーションで行うサニタイズなどのセキュリティ対策などを利用せずに、
**グローバル変数を直接利用することは脆弱性につながるため、利用してはいけません。
同様にグローバル変数に直接値を挿入するなども利用してはいけません。**

## シンプルなパラメータ
Laravelではリクエストパラメータを受け取るには、`\Illuminate\Http\Requestインスタンス`を利用します。
このインスタンスはInput、Requestファサードとしても利用できます。
次のコードは\Illuminate\Http\Requestインスタンスを利用する例です。

```php
\Route::get('request', function (\Illuminate\Http\Request $request) {
    return 'get:' . $request->input('message');
});
```

GETリクエストで次のURLにアクセスしてみましょう。
```
http://homestead.app/request?message=laravel
```
画面上に*get:laravel*と表示され、messageパラメータがない場合は*get:*と表示されます。
これはPOSTリクエストやPATCHなどでも同じです。
この`Illuminate\Http\Requestクラス`はSymfony Componentの`Symfony\Component\HttpFoundation\Requestクラス`を継承しています。
このためリクエストパラメータ取得などに`Symfony\Component\HttpFoundation\Requestクラス`のメソッドも利用できます。

## セグメント
ルートで次のようなURIを作成したい場合もあるでしょう。

```
http://homestead.app/user/profile/1
```

このようなルートを記述する場合は、次のように記述します。

```php
get('user/profile/{id}', function ($id) {
    return 'user:' . $id;
});
```

これでセグメントの値が取得できますが、値が空の場合、`user/profile/`とした場合はエラーとなります。
仮にこのidが空の場合もアクセスさせたい場合は次のように記述します。

```php
get('user/profile/{id?}', function ($id = null) {
    return 'user:' . $id;
});

```

Illuminate\Http\Requestインスタンスと併用しても構いません。

```php
get('user/profile/{id?}', function (\Illuminate\Http\Request $request, $id = null) {
    return 'user:' . $id . ':' . $request->input('message');
});
```

下記のようにアクセスしてみましょう。
```
http://homestead.app/user/profile/1?message=laravel
```

# より高度なルーティング記述
HTTPメソッドに対応したルートの記述方法の他に、
ルートに名前をつけたり、グループ化してまとめて変更する、といった記述方法があります。

## ルート名をつける
```php
get('named', [
    'as'   => 'basic.get',
    'uses' => function () {
        return 'named';
    }
]);

```

これは/namedに[basic.get]という別名を与えています。
名前をつけることでアプリケーション内でのURL生成などに利用ができ、
名前のみに依存しますので、URLを変更する場合などでソースコードを変更する必要がありません。
ルート名からURLを取得する場合は以下のようにrouteヘルパーメソッドなどを利用します。

```php
route('basic.get');
```

## グループ化
特定のルートをグループとしてURIのプレフィックスや名前を指定します。
次のコードは、/namedのGET、POSTをグループとしてURIのプレフィックスにapi/v1を付与し、
ルート名のプレフィックスに*group::*を付与します。

```php
\Route::group(['prefix' => 'api/v1', 'as' => 'group::'], function () {
    get('named', [
        'as'   => 'basic.get',
        'uses' => function () {
            return 'named';
        }
    ]);
    post('named', [
        'as'   => 'basic.post',
        'uses' => function () {
            return 'named.post';
        }
    ]);
});

```

ルート一覧では次のように表示されます。

```bash
$ php artisan route:list
+--------+----------+--------------+-------------------+---------+------------+
| Domain | Method   | URI          | Name              | Action  | Middleware |
+--------+----------+--------------+-------------------+---------+------------+
|        | POST     | api/v1/named | group::basic.post | Closure |            |
|        | GET|HEAD | api/v1/named | group::basic.get  | Closure |            |
+--------+----------+--------------+-------------------+---------+------------+
```

## セグメントの値を制限する
正規表現を用いて、制限をかけることができます。
以下の様に記述します。

```php
\Route::pattern('id', '[0-9]+');
```

# routes.phpを利用しない
routes.phpは**app/Providers/RouteServiceProvider.php**のmapメソッドに記述されています。
このroutes.phpを利用せずにmapメソッド内に直接記述することもできます。

```php
    public function map(Router $router)
    {
        $router->get('map/request', function () {
            return 'mapping';
        });
    }
```

次回はビューテンプレートを利用して描画とルーティングを学びます。
