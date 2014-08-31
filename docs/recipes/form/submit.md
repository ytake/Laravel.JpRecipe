---
Title:    Submitボタンを作成する
Topics:   forms
Code:     Form::submit()
Id:       171
Position: 21
---

{problem}
Bladeテンプレートでボタンを作成したい
{/problem}

{solution}
`Form::submit()`メソッドを利用します

引数を指定せずに利用可能です

```html
{{Form::submit()}}
```

これは下記の様に出力されます

```html
<input type="submit">
```

valueを指定するには第一引数を利用します

```html
{{Form::submit('Save')}}
```

これは下記の様に出力されます

```html
<input type="submit" value="Save">
```

属性を追加する場合は、第二引数に配列を利用しなければなりません

```html
{{Form::submit('Save', ['class' => 'btn'])}}
```

属性`class`が追加されます

```html
<input class="btn" type="submit" value="Save">
```
{/solution}

{discussion}
特にありません
{/discussion}
