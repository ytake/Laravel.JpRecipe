Laravelのルーティングとビューテンプレートについて学びます。

# ビューテンプレートについて
他のphpフレームワークと同様にビューテンプレートが利用できます。
デフォルトではLaravelのBladeと呼ばれるものがテンプレートエンジンにあたりますが、
これに加えて通常のphpファイルも利用できます。

## ディレクトリ
まずテンプレートファイルのディレクトリを覚えておきましょう。
デフォルトではresources/views配下がテンプレートのディレクトリとなります。
もしこのディレクトリを変更したい場合は、**config/view.php**ファイルのpathsキーで変更できます。
ここには配列でディレクトリを指定できますので、
アプリケーション自体をモジュール化したい場合や、
パッケージ化したアプリケーションを読み込みたい場合などに利用します。
ディレクトリは必ずしも固定ではないことを覚えておきましょう。

## ルートでテンプレートを利用する
前回のチュートリアルにあったように、app/Http/routes.phpに次のルートを記述して、
GETで/requestにアクセスできるようにします。

```php
<?php

get('request', function (\Illuminate\Http\Request $request) {
    return 'get';
});

```

パラメータも受け取れるように`Illuminate\Http\Request`を記述しましょう。
次にテンプレートとして`resources/views/sample.php`ファイルを作成して以下の文字を記述します。

```php
hello
```

routes.phpの中身を次のコードへ変更します。
```php
<?php

get('request', function (\Illuminate\Http\Request $request) {
    return view('sample');
});

```

ブラウザなどから**/request**にアクセスしてみましょう。
画面上にhelloが表示されているはずです。
このviewヘルパーメソッドは、config/view.phpに記述されたパス配下に設置してあるファイルを取得し、
コンテンツを描画して返却します。
ファイルの拡張子まで含める必要はありません。

では、viewsディレクトリ配下でさらにディレクトリを利用する場合はどのようにするのでしょうか？
下記のようにスラッシュを用いて記述するか、**.**を使ってディレクトリを表現できます。
```php
view('sample/directory');
view('sample.directory');
```

## テンプレートに変数を渡す
リクエストパラメータなどをテンプレートに渡す場合はどのようにするのでしょうか？
さきほどのルートを使って次のように変更しましょう。

```php
get('request', function (\Illuminate\Http\Request $request) {
    return view('sample.directory', ['request' => $request->input('message')]);
});

```

viewヘルパーメソッドの第二引数で、リクエストパラメータの'message'を'request'という変数でテンプレートに渡すように記述します。
テンプレートとして利用しているphpファイルを次のように記述します。

```php
directory :<?php echo $request; ?>
```

次のようにアクセスしてみましょう。

```
http://homestead.app/request?message=laravel
```

messageの値が表示されているはずです。
これが最もシンプルなルーティングとテンプレートの組み合わせです。

このviewヘルパーメソッドはwithメソッドを組み合わせて利用することもできます。

```php
view('sample.directory')->with(['request' => $request->input('message')]);
view('sample.directory')->with('request', $request->input('message'));
```

上記はどちらも意味は同じです。
このwithメソッドはいくつ繋げて記述しても構いません。

また他の記述方法として、`Viewファサード`を利用して記述することもできます。

```php
\View::make('sample.directory', ['request' => $request->input('message')]);
\View::make('sample.directory')->with(['request' => $request->input('message')]);
\View::make('sample.directory')->with('request', $request->input('message'));
```

こちらはviewヘルパーメソッドと全く同じ意味をもちます。
以前のLaravel4系で利用されていました。
好みに応じて利用しましょう。

# Blade
つぎにLaravelのテンプレートエンジンであるBladeを利用してみましょう。
Bladeは前述したphpファイルと異なり、ファイルの拡張子をblade.phpとしなければなりません。
**sample.directory**であれば、resources/views/sample/directory.blade.phpとなります。

Bladeを用いた場合の記述方法は次のようになります。

```php
directory :{{ $request }}
```

さきほどの`<?php echo ?>`の部分が`{{ }}`となりました。
この`{{ }}`はデリミタと呼びます（SmartyやTwigなども名称は同じです）。

## Bladeテンプレートのデリミタの意味
Bladeでは3種類のデリミタを利用します。
このデリミタによる違いは以下の通りです。

| デリミタ    |  描画処理 |
|-----------|------------|
| {!! !!}   | エスケープせずに与えられた値をそのまま出力 |
| {{ }}     | 指定されたechoFormatを利用して出力。デフォルトではe()ヘルパーメソッドを利用 |
| {{{ }}}   | eヘルパーメソッドを利用して出力 |

このeヘルパーメソッドは、内部でphpのhtmlentities関数を利用しています。

```php
if (! function_exists('e')) {
    /**
     * Escape HTML entities in a string.
     *
     * @param  \Illuminate\Support\Htmlable|string  $value
     * @return string
     */
    function e($value)
    {
        if ($value instanceof Htmlable) {
            return $value->toHtml();
        }

        return htmlentities($value, ENT_QUOTES, 'UTF-8', false);
    }
}

```
セキュリティで後述しますが、XSSなどの対策のためにコンテンツを描画する際には必ず利用するようにしましょう。
（このエスケープを任意の方法に変更することもできます）

もし開発で、[vue.js](http://jp.vuejs.org/)や[AngularJS](https://angularjs.org/)のようなJavaScriptフレームワークを利用する場合は、
このデリミタがBladeで処理されてしまうため、うまく利用できなくなるでしょう。

*vue.js*
```html
<div id="person-{{id}}">Hello {{name}}!</div>
```

*angular.js*
```html
<p>Nothing here {{'yet' + '!'}}</p>
```

この場合はJavaScriptフレームワークでデリミタを変更しても構いませんが、
ブラウザで処理させるよりもサーバサイドで変更すべきです。
このデリミタをエスケープさせるには次のように記述できます。

```php
directory :@{{{ $request }}}
directory :@{{ $request }}
```

さらに、デリミタを次のコードで変更できます。

```php
\Blade::setRawTags('^^', '^^');
\Blade::setContentTags('**', '**');
\Blade::setEscapedContentTags('***', '***');
```

このコードを書く場所はいくつかありますが、
このチュートリアルではroutes.phpのルート記述の上部でも構いません。


通常のphpファイルとBladeテンプレートはLaravelのが提供しているファサードやヘルパーメソッドも記述できます。
このためいろんな処理を記述しがちになりますが、
ロジックなどはテンプレートに記述しないように心がけましょう。

ルートとビューテンプレートのみを使った簡単なアプリケーションを紹介しました。
