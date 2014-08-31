---
Title:    ラジオボタンを作成する
Topics:   forms
Code:     Form::radio()
Id:       168
Position: 18
---

{problem}
Bladeテンプレートでラジオボタンを作成したい
{/problem}

{solution}
`Form::radio()`メソッドを利用します

第一引数でフィールド名を必ず指定しなければなりません

```html
{{Form::radio('single')}}
```

これは下記の様に出力されます

```html
<input name="single" type="radio" value="single">
```

ラジオボタンはいくつか同じフィールド名を利用しますので、
フィールド名に同じものを指定し、valueを第二引数で指定します

```html
{{Form::radio('sex', '男性')}}<br />
{{Form::radio('sex', '女性')}}
```

男性か女性を選択するラジオボタンが作成されます

```html
<input name="sex" type="radio" value="男性"><br />
<input name="sex" type="radio" value="女性">
```

デフォルトでチェックされた状態にする場合は、第三引数に`true`を指定します

```html
{{Form::radio('sex', '男性')}}<br>
{{Form::radio('sex', '女性', true)}}
```

2つ目のラジオボタンに`checked`属性を追加します

```html
<input name="sex" type="radio" value="男性"><br>
<input checked="checked" name="sex" type="radio" value="女性">
```

最後に、属性を追加するには第四引数に配列を利用します

```html
{{Form::radio('example', 1, true, ['class' => 'field'])}}
```

属性`class`が追加されます

```html
<input class="field" checked="checked" name="example" type="radio" value="1">
```
{/solution}

{discussion}
自動的にフォームのセッションデータに基づいて、利用可能なデータがあれば該当するボタンをチェックされた状態にします

バリデートエラーなどでフォームを再表示する場合には、
ラジオボタンフィールドにはユーザーが以前に選択した値が保持されて利用されます

フォームにモデルをバインドして作成している場合は、モデルのデータから値を利用します
[[モデルをベースにしたフォームを作成する]] も参照して下さい
{/discussion}
