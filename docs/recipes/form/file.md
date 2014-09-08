---
Title:    ファイルアップロードのフィールドを作成する
Topics:   forms
Position: 10
---

{problem}
ファイルアップロードのフィールドを作成したい

`<input type="file"...>`利用せずに、`Form`ファサードを利用してみましょう
{/problem}

{solution}
`Form::file()`メソッドを利用します

通常はBladeテンプレートで利用します

このメソッドの一番簡単な方法は、フィールド名のみを指定する方法です

```html
{{ Form::file('thefile') }}
```

以下の様なシンプルなエレメントが作成されます

```html
<input name="thefile" type="file">
```

属性を追加する場合は、第二引数に配列を利用しなければなりません

```html
{{Form::file('thefile', ['class' => 'field'])}}
```

属性`class`が追加されます

```html
<input class="field" name="thefile" type="file">
```
{/solution}

{discussion}
このメソッドは`Form::input()`メソッドを利用し、typeに`"file"`を指定しています
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
