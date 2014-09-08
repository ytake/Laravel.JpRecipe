---
Title:    月を選択するセレクトボックスを作成する
Topics:   form
Position: 16
---

{problem}
年月日の月を選択するセレクトボックスを作成したい
{/problem}

{solution}
`Form::selectMonth()`メソッドを利用します

フィールド名を指定するだけで利用できます

```html
{{ Form::selectMonth('month') }}
```

12個の選択肢を含んだセレクトボックスが作成されます

```html
<select name="month">
  <option value="1">January</option>
  <option value="2">February</option>
  <option value="3">March</option>
  <option value="4">April</option>
  <option value="5">May</option>
  <option value="6">June</option>
  <option value="7">July</option>
  <option value="8">August</option>
  <option value="9">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option value="12">December</option>
</select>
```
{/solution}

{discussion}
デフォルト値を指定する場合は第二引数に、  
属性を追加する場合は、第三引数に配列を利用します

```html
{{Form::selectMonth('month', 7, ['class' => 'field'])}}
```

7月が選択された状態になり、フィールドに`class`が追加されます

```html
<select class="field" name="month">
  <option value="1">January</option>
  <option value="2">February</option>
  <option value="3">March</option>
  <option value="4">April</option>
  <option value="5">May</option>
  <option value="6">June</option>
  <option value="7" selected="selected">July</option>
  <option value="8">August</option>
  <option value="9">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option value="12">December</option>
</select>
```
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
