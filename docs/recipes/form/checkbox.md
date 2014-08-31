---
Title:    チェックボックスを作成する
Topics:   forms
Code:     Form::checkbox()
Id:       167
Position: 17
---

{problem}
Bladeテンプレートでチェックボックスを作成したい
{/problem}

{solution}
`Form::checkbox()`メソッドを利用します

第一引数でフィールド名を必ず指定しなければなりません

```html
{{Form::checkbox('agree')}}
```

これは下記の様に出力されます

```html
<input name="agree" type="checkbox" value="1">
```

valueを第二引数で指定する事が出来ます

```html
{{Form::checkbox('agree', 'yes')}}
```

チェックされた場合に、vakueは"yes"が利用されます

```html
<input name="agree" type="checkbox" value="yes">
```

デフォルトでチェックされた状態にする場合は、第三引数に`true`を指定します

```html
{{Form::checkbox('agree', 1, true)}}
```

`checked`属性を追加します

```html
<input checked="checked" name="agree" type="checkbox" value="1">
```

最後に、属性を追加するには第四引数に配列を利用します

```html
{{Form::checkbox('agree', 1, null, ['class' => 'field'])}}
```

属性`class`が追加されます

```html
<input class="field" name="agree" type="checkbox" value="1">
```
{/solution}

{discussion}
自動的にフォームのセッションデータに基づいて、利用可能なデータがあれば該当するボタンをチェックされた状態にします

バリデートエラーなどでフォームを再表示する場合には、
ラジオボタンフィールドにはユーザーが以前に選択した値が保持されて利用されます

フォームにモデルをバインドして作成している場合は、モデルのデータから値を利用します
[[モデルをベースにしたフォームを作成する]] も参照して下さい
{/discussion}
