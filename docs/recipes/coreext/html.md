---
Title:    HTMLマクロを作成する
Topics:   html
Code:     HTML::attributes(), HTML::decode(), HTML::email(),
          HTML::entities(), HTML::image(), HTML::link(), HTML::linkAction(),
          HTML::linkAsset(), HTML::linkRoute(), HTML::linkSecureAsset(),
          HTML::macro(), HTML::mailto(), HTML::obfuscate(), HTML::ol(),
          HTML::script(), HTML::secureLink(), HTML::style(), HTML::ul()
Id:       181
Position: 3
---

{problem}
`HTML`ファサードを拡張して、機能を追加したい
{/problem}

{solution}
`HTML::macro()`メソッドを利用します

`HTML::macro()`は`HTML`ファサードを拡張して、独自のメソッドを追加する事ができます

最初にマクロを登録しましょう
その後に`HTML`ファサードを拡張して利用出来る様にします

`app/start/global.php`ファイルに下記の様に追加してみましょう

```php
\HTML::macro('sumthin', function() {
    return '<sumthin>default</sumthin>';
});
```

その後、Bladeテンプレートで以下の様に記述します

```html
{{HTML::sumthin()}}
```

この様に出力されます

```html
<sumthin>default</sumthin>
```

#### マクロに引数を追加しましょう

`sumthin`マクロで引数を使える様に変更します

```php
\HTML::macro('sumthin', function($value, $count = 10, $start = 1) {
    $build = [];
    while ($count > 0) {
        $build[] = sprintf('<sumthin index="%s">%s</sumthin>',
          $start, $value);
        $start += 1;
        $count -= 1;
    }
    return join("\n", $build);
});
```

`HTML::sumthin()`に必須の引数一つと、二つのオプションを追加しました。
引数を指定しない場合、Laravelはエラーを返します

テンプレートで以下の様に記述します

```html
{{HTML::sumthin('test', 5)}}
```

下記の様に出力されます

```html
<sumthin index="1">test</sumthin>
<sumthin index="2">test</sumthin>
<sumthin index="3">test</sumthin>
<sumthin index="4">test</sumthin>
<sumthin index="5">test</sumthin>
```
{/solution}

{discussion}
ソースコードを見てみましょう！

`vendor/laravel/src/Illuminate\Html`ディレクトリの`HtmlBuilder.php`を見ると、
リファレンス等に載っていないいくつかのpublicメソッドがあります。

マクロで`$this`にはアクセス出来ませんが、以下のメソッドを利用する事ができます:

* `HTML::entities()` - See [[HTML文字列をエンティティへ変換する]].
* `HTML::decode()` - See [[HTMLエンティティのデコード]].
* `HTML::script()` - See [[javascriptファイルへのリンクを作成する]].
* `HTML::style()` - See [[cssファイルへのリンクを作成する]].
* `HTML::image()` - See [[HTMLイメージタグを生成する]].
* `HTML::link()` - See [[HTMLリンクを生成する]].
* `HTML::secureLink()` - See [[セキュアなHTMLリンクを生成する]].
* `HTML::linkAsset()` - See [[assetHTMLリンクを生成する]].
* `HTML::linkSecureAsset()` - See [[セキュアなassetHTMLリンクを生成する]].
* `HTML::linkRoute()` - See [[名前付きルートへのHTMLリンクを生成する]].
* `HTML::linkAction()` - See [[コントローラのアクションへのHTMLリンクを生成する]].
* `HTML::mailto()` - See [[メールアドレスのHTMLリンクを生成する]].
* `HTML::email()` - See [[メールアドレスを難読化]].
* `HTML::ol()` - See [[順序付きリストを生成する]].
* `HTML::ul()` - See [[順序なしリストを生成する]].
* `HTML::attributes()` - See [[HTMLの属性を配列で作成する]].
* `HTML::obfuscate()` - See [[文字列を難読化]].

マクロから他のマクロをコールする事ができます
{/discussion}
