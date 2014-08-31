---
Title:    テキストエリアを作成する
Topics:   forms
Code:     Form::textarea()
Id:       162
Position: 12
---

{problem}
Bladeテンプレートでテキストエリアを作成したい
{/problem}

{solution}
`Form::textarea()`メソッドを利用します

一番簡単な方法は、フィールド名のみを指定します

```html
{{Form::textarea('notes')}}
```

以下の様なHTMLが作成されます

```html
<textarea name="notes" cols="50" rows="10"></textarea>
```

_Notice デフォルトで **cols** と **rows** は上記の様になります_

_value_ を指定したい場合は第二引数で指定します

```html
{{Form::textarea('notes', '3 < 4')}}
```

値がエスケープされます

```html
<textarea name="notes" cols="50" rows="10">3 &amp;lt; 4</textarea>
```

属性を追加する場合は、第三引数に配列を利用します

```html
{{Form::textarea('notes', null, ['class' => 'field'])}}
```

フィールドに`class`が追加されます

```html
<textarea class="field" name="notes" cols="50" rows="10"></textarea>
```
{/solution}

{discussion}
ドキュメントにはありませんが、"size"属性を利用する事が出来ます

"size"を利用する場合は、"30x5"という形で利用しますが、
最初の数字(30)で列数を指定し、2番目の数字は行を指定した形式でなければなりません

```html
{{ Form::textarea('notes', null, ['size' => '30x5']) }}
```

次の様に出力されます

```html
<textarea name="notes" cols="30" rows="5"></textarea>
```

または"rows", "cols"を第三引数で指定して利用する事も可能です

```html
{{Form::textarea('notes', 'hoge', ['rows' => 1,'cols' => 1])}}
```

```html
<textarea rows="1" cols="1" name="notes">hoge</textarea>
```
{/discussion}
