---
Title:    パスワードフィールドを作成する
Topics:   forms
Position: 6
---

{problem}
パスワードフィールドを作成したい

`<input type="password"...>`を利用せずに、`Form`ファサードを利用してみましょう
{/problem}

{solution}
`Form::password()`メソッドを利用します

通常はBladeテンプレートで利用します

このメソッドの一番簡単な方法は、フィールド名のみを指定します

```html
{{Form::password('secret')}}
```

以下の様なシンプルなエレメントが作成されます

```html
<input name="secret" type="password" value="">
```

属性を追加する場合は、第二引数に配列を利用しなければなりません

```html
{{Form::password('secret', ['class' => 'field'])}}
```

パスワードフィールドに`class`が追加されます

```html
<input class="field" name="secret" type="password" value="">
```
{/solution}

{discussion}
このメソッドは`Form::input()`メソッドを利用し、typeに`"password"`を指定しています
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
