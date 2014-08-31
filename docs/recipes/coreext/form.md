---
Title:    Formマクロを作成する
Topics:   form
Code:     Form::button(), Form::checkbox(), Form::close(), Form::email(),
          Form::file(), Form::getIdAttribute(), Form::getSelectOption(),
          Form::getSessionStore(), Form::getValueAttribute(), Form::hidden(),
          Form::image(), Form::input(), Form::label(), Form::macro(),
          Form::model(), Form::old(), Form::oldInputIsEmpty(), Form::open(),
          Form::password(), Form::radio(), Form::reset(), Form::select(),
          Form::selectMonth(), Form::selectRange(), Form::selectYear(),
          Form::setSessionStore(), Form::submit(), Form::text(),
          Form::textarea(), Form::token(), Form::url()
Id:       173
Position: 2
---

{problem}
`Form`ファサードを拡張して、機能を追加したい
{/problem}

{solution}
`Form::macro()`メソッドを利用します

`Form::macro()`は`Form`ファサードを拡張して、独自のメソッドを追加する事ができます

最初にマクロを登録しましょう
その後に`Form`ファサードを拡張して利用出来る様にします

`app/start/global.php`ファイルに下記の様に追加してみましょう

```php
\Form::macro('sumthin', function() {
    return '<input type="sumthin" value="default">';
});
```

その後、Bladeテンプレートで以下の様に記述してアクセスします

```html
{{Form::sumthin()}}
```

この様に出力されます

```html
<input type="sumthin" value="default">
```

#### マクロに引数を追加しましょう

`sumthin`マクロで引数を使える様に変更します

```php
\Form::macro('sumthin', function($value, $count = 10, $start = 1) {
    $build = [];
    while ($count > 0) {
        $build[] = sprintf('<input type="sumthun" value="%s" index="%s">',
          $value, $start);
        $start += 1;
        $count -= 1;
    }
    return join("\n", $build);
});
```

`Form::sumthin()`に必須の引数一つと、二つのオプションを追加しました。
引数を指定しない場合、Laravelはエラーを返します

テンプレートで以下の様に記述します

```html
{{Form::sumthin('test', 5)}}
```

The output would be.

{html}
<input type="sumthin" value="test" index="1">
<input type="sumthin" value="test" index="2">
<input type="sumthin" value="test" index="3">
<input type="sumthin" value="test" index="4">
<input type="sumthin" value="test" index="5">
{/html}
{/solution}

{discussion}
ソースコードを見てみましょう！

`vendor/laravel/src/Illuminate\Html`ディレクトリの`FormBuilder.php`を見ると、
リファレンス等に載っていないいくつかのpublicメソッドがあります。

マクロで`$this`にはアクセス出来ませんが、以下のメソッドを利用する事ができます:

* `Form::token()` - [[CSRFトークンを生成する]].
* `Form::getIdAttribute()` - [[フィールド名のID属性を取得する]].
* `Form::getValueAttribute()` - [[優先度を付けた入力値の取得]].
* `Form::old()` - [[セッションから前の入力値を取得する]].
* `Form::oldInputIsEmpty()` - [[以前の入力値が空かどうかを確認する]].
* `Form::getSelectOption()` - [[選択オプションを取得]].
* `Form::setSessionStore()` - [[フォームで利用するセッションを設定する]].

または標準的なメソッドをコールする事もできます:

* `Form::open()` - [[HTMLフォームを作成する]].
* `Form::model()` - [[モデルをベースにしたフォームを作成する]].
* `Form::close()` - [[フォームを閉じる]].
* `Form::label()` - [[フォームのラベルを作成する]].
* `Form::input()` - [[入力フィールドを作成する]].
* `Form::text()` - [[テキスト入力フィールドを作成する]].
* `Form::password()` - [[パスワードフィールドを作成する]].
* `Form::hidden()` - [[hiddenフィールドを作成する]].
* `Form::email()` - [[メールアドレス入力フィールドを作成する]].
* `Form::url()` - [[URL入力フィールドを作成する]].
* `Form::file()` - [[ファイルアップロードのフィールドを作成する]].
* `Form::textarea()` - [[テキストエリアを作成する]].
* `Form::select()` - [[セレクトボックスを作成する]].
* `Form::selectRange()` - [[ 選択肢の範囲を指定してセレクトボックスを作成する]].
* `Form::selectYear()` - [[年を選択するセレクトボックスを作成する]].
* `Form::selectMonth()` - [[月を選択するセレクトボックスを作成する]].
* `Form::checkbox()` - [[チェックボックスを作成する]].
* `Form::radio()` - [[ラジオボタンを作成する]].
* `Form::reset()` - [[リセットボタンを作成する]].
* `Form::image()` - [[画像ボタンを作成する]].
* `Form::submit()` - [[Submitボタンを作成する]].
* `Form::button()` - [[ボタンを作成する]].
* `Form::getSessionStore()` - [[フォームで利用するセッションクラスを取得する]].

マクロから他のマクロをコールする事ができます
{/discussion}
