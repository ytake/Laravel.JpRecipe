---
Title:    入力フィールドを作成する
Topics:   forms
Code:     Form::email(), Form::file(), Form::hidden(), Form::input(),
          Form::model(), Form::password(), Form::text(), Form::url()
Id:       161
Position: 11
---

{problem}
入力フィールドを作成したい

直接HTMLタグを記述する代わりに、Laravelの`Form`ファサードを利用してみましょう
{/problem}

{solution}
`Form::input()`メソッドを利用します

このメソッドは4つの引数が利用できます:

1. `$type` - _(必須)_ 最初の引数は入力タイプを指定します `"text"`, `"password"`, `"file"`などの値です
2. `$name` - _(必須)_ 第二引数はフィールド名です
3. `$value` - _(オプション)_ 第三引数は入力フィールドの値を指定します
4. `$options` - _(オプション)_ 第四引数は、追加したいフィールド属性を配列で指定します `"id"`, `"size"` または `"class"`等を指定します

通常はBladeテンプレートで利用されます

```html
{{Form::input('text', 'name')}}
{{Form::input('email', 'email_address', null, ['class' => 'emailfld'])}}
```
{/solution}

{discussion}
希望するフィールドのタイプを指定して作成しますが、
`Form::input()`を利用する代わりに下記のメソッドも直接利用する事が出来ます

* `Form::password()` - [[パスワードフィールドを作成する]].
* `Form::text()` - [[テキスト入力フィールドを作成する]].
* `Form::hidden()` - [[hiddenフィールドを作成する]].
* `Form::email()` - [[メールアドレス入力フィールドを作成する]].
* `Form::url()` - [[URL入力フィールドを作成する]].
* `Form::file()` - [[ファイルアップロードのフィールドを作成する]].

### Model binding

フォームモデルを利用して入力値をオーバーライドする方法については、
[[モデルをベースにしたフォームを作成する]] レシピをご覧ください
{/discussion}
