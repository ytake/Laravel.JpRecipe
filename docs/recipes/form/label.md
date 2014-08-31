---
Title:    フォームのラベルを作成する
Topics:   forms
Code:     Form::label()
Id:       154
Position: 5
---

{problem}
フォームのラベルを作成したい

Laravelの`Form`ファサードを利用してみましょう
{/problem}

{solution}
`Form::label()`メソッドを利用します

2つの引数を利用します (名前と値)

```html
{{Form::label('name', 'Your Name')}}
```

これは下記の様に出力されます

```html
<label for="name">Your Name</label>
```

第三引数に配列を利用すると属性を追加することができます。

```html
{{Form::label('name', 'Your Name', ['class' => 'mylabel'])}}
```

'class'が追加されます

```html
<label for="name" class="mylabel">Your Name</label>
```
{/solution}

{discussion}
'値'の引数を省略する事も可能です

引数が省略されている場合でも適切に出力されます

```html
{{Form::label('first_name')}}

{{Form::label('phone_number')}}
```

次の様に出力されます

```html
<label for="first_name">First Name</label>
<label for="phone_number">Phone Number</label>
```

**Form::label() を使うと、関連付くエレメントに自動でIDを生成します**

ラベルの _for_ で関連付くエレメントに idが無い場合はに、自動でidを作成します

```html
{{Form::label('testing')}}
{{Form::text('testing')}}
```

上記の様に記述した場合は
idを指定していない場合は下記の様に出力されます

```html
<label for="testi">Testi</label>
<input name="testing" type="text" id="testing">
```

_これは`Form`ファサードを利用して生成した場合にのみ作用します_
{/discussion}
