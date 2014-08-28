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

* `Form::token()` - See [[CSRFトークンを生成する]].
* `Form::getIdAttribute()` - See [[フィールド名のID属性を取得する]].
* `Form::getValueAttribute()` - See [[Getting the Value Attribute a Field Should Use]].
* `Form::old()` - See [[Getting a Value From the Session's Old Input]].
* `Form::oldInputIsEmpty()` - See [[Determining if the Old Input is Empty]].
* `Form::getSelectOption()` - See [[Getting the Select Option for a Value]].
* `Form::setSessionStore()` - See [[Setting the Session Store Implementation]].

または標準的なメソッドをコールする事もできます:

* `Form::open()` - See [[Opening a New HTML Form]].
* `Form::model()` - See [[Creating a New Model Based Form]].
* `Form::close()` - See [[Closing the Current Form]].
* `Form::label()` - See [[Creating a Form Label Element]].
* `Form::input()` - See [[Creating a Form Input Field]].
* `Form::text()` - See [[Creating a Text Input Field]].
* `Form::password()` - See [[Creating a Password Input Field]].
* `Form::hidden()` - See [[Creating a Hidden Input Field]].
* `Form::email()` - See [[Creating an Email Input Field]].
* `Form::url()` - See [[Creating a URL Input Field]].
* `Form::file()` - See [[Creating a File Input Field]].
* `Form::textarea()` - See [[Creating a Textarea Input Field]].
* `Form::select()` - See [[Creating a Select Box Field]].
* `Form::selectRange()` - See [[Creating a Select Range Field]].
* `Form::selectYear()` - See [[Creating a Select Year Field]].
* `Form::selectMonth()` - See [[Creating a Month Selection Field]].
* `Form::checkbox()` - See [[Creating a Checkbox Input Field]].
* `Form::radio()` - See [[Creating a Radio Button Input Field]].
* `Form::reset()` - See [[Creating a Reset Input Field]].
* `Form::image()` - See [[Creating an Image Input Element]].
* `Form::submit()` - See [[Creating a Submit Button]].
* `Form::button()` - See [[Creating a Button Element]].
* `Form::getSessionStore()` - See [[Getting the Session Store]].

マクロから他のマクロをコールする事ができます
{/discussion}
