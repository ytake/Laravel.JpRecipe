---
Title:    ボタンを作成する
Topics:   forms
Code:     Form::button()
Id:       172
Position: 22
---

{problem}
Bladeテンプレートでボタンを作成したい
{/problem}

{solution}
`Form::button()`メソッドを利用します

第一引数でvalueを指定してください

```html
{{Form::button('Hit Me')}}
```

簡単にHTMLが作成されます

```html
<button type="button">Hit Me</button>
```

第二引数は配列を利用して属性を追加します

```html
{{Form::button('Hit Me', ['class' => 'btn'])}}
```

ボタンに`class`が追加されます

```html
<button class="btn" type="button">Hit Me</button>
```
{/solution}

{discussion}
とくにありません
{/discussion}
