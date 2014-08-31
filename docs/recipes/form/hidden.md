---
Title:    hiddenフィールドを作成する
Topics:   forms
Code:     Form::hidden(), Form::input(), Form::model()
Id:       157
Position: 7
---

{problem}
hidden入力フィールドを作成したい

`<input type="hidden"...>`を利用せずに、`Form`ファサードを利用してみましょう
{/problem}

{solution}
`Form::hidden()`メソッドを利用します

通常はBladeテンプレートで利用します

フィールド名と値をそれぞれ指定します

```html
{{Form::hidden('invisible', 'secret')}}
```

以下の様にシンプルなエレメントが作成されます

```html
<input name="invisible" type="hidden" value="secret">
```

属性を追加する場合は、第三引数に配列を利用します

```html
{{Form::hidden('invisible', 'secret', ['id' => 'invisible_id'])}}
```

フィールドに`id`が追加されます

```html
<input id="invisible_id" name="invisible" type="hidden" value="secret">
```
{/solution}

{discussion}
このメソッドは`Form::input()`に`"hidden"`タイプを指定して利用しています

**NOTE:** フォームモデルを利用している場合は、値利用の優先度が異なります
詳しくは[[モデルをベースにしたフォームを作成する]] をご覧ください
{/discussion}
