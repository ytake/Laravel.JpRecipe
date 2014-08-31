---
Title:    リセットボタンを作成する
Topics:   forms
Code:     Form::reset()
Id:       169
Position: 19
---

{problem}
Bladeテンプレートでリセットボタンを作成したい
{/problem}

{solution}
`Form::reset()`メソッドを利用します

第一引数でvalueを指定してください

```html
{{ Form::reset('Clear form') }}
```

これは下記の様に出力されます

```html
<input type="reset" value="Clear form">
```

属性を追加する場合は、第二引数に配列を利用しなければなりません

```html
{{Form::reset('Clear form', ['class' => 'form-button'])}}
```

属性`class`が追加されます

```html
<input class="form-button" type="reset" value="Clear form">
```
{/solution}

{discussion}
特にありません
{/discussion}
