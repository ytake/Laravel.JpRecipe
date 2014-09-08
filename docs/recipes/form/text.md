---
Title:    テキスト入力フィールドを作成する
Topics:   forms
Position: 6
---

{problem}
テキスト入力フィールドを作成したい

`<input type="text"...>`を利用せずに、`Form`ファサードを利用してみましょう
{/problem}

{solution}
`Form::text()`メソッドを利用します

通常はBladeテンプレートで利用します

このメソッドの一番簡単な方法は、フィールド名のみを指定します

```html
{{Form::text('first_name')}}
```

以下の様にシンプルなエレメントが作成されます

```html
<input name="first_name" type="text">
```

_value_ を指定したい場合は第二引数で指定します

```html
{{ Form::text('first_name', 'Chuck') }}
```

次の様に出力されます

```html
<input name="first_name" type="text" value="Chuck">
```

属性を追加する場合は、第三引数に配列を利用します

```html
{{Form::text('first_name', 'Chuck', ['class' => 'field'])}}
```

フィールドに`class`が追加されます

```html
<input class="field" name="first_name" type="text" value="Chuck">
```
{/solution}

{discussion}
このメソッドは`Form::input()`に`"text"`タイプを指定して利用しています

以前のリクエストがこのフォームから送信された場合に、  
セッションから値を取得し、自動的にユーザーが最後に入力した値が利用されます

**NOTE:** フォームモデルを利用している場合は、値利用の優先度が異なります  
詳しくは[[モデルをベースにしたフォームを作成する]] をご覧ください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
