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

* `HTML::entities()` - See [[Converting a HTML String to Entities]].
* `HTML::decode()` - See [[Decoding HTML Entities to a String]].
* `HTML::script()` - See [[Generating a Link to a Javascript File]].
* `HTML::style()` - See [[Generating a Link to a CSS File]].
* `HTML::image()` - See [[Generating an HTML Image Element]].
* `HTML::link()` - See [[Generating a HTML Link]].
* `HTML::secureLink()` - See [[Generating a Secure HTML Link]].
* `HTML::linkAsset()` - See [[Generating a HTML Link to an Asset]].
* `HTML::linkSecureAsset()` - See [[Generating a Secure HTML Link to an Asset]].
* `HTML::linkRoute()` - See [[Generating a HTML Link to a Named Route]].
* `HTML::linkAction()` - See [[Generating a HTML Link to a Controller Action]].
* `HTML::mailto()` - See [[Generating a HTML Link to an Email Address]].
* `HTML::email()` - See [[Obfuscating an Email Address]].
* `HTML::ol()` - See [[Generating an Ordered List of Items]].
* `HTML::ul()` - See [[Generating an Unordered List of Items]].
* `HTML::attributes()` - See [[Bulding an HTML Attribute String From an Array]].
* `HTML::obfuscate()` - See [[Obfuscating a String]].

マクロから他のマクロをコールする事ができます
{/discussion}
