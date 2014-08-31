---
Title:    セレクトボックスを作成する
Topics:   forms
Code:     Form::select()
Id:       163
Position: 13
---

{problem}
Bladeテンプレートでセレクトボックスを作成したい

`<select>`を利用せずに、`Form`ファサードを利用してみましょう
{/problem}

{solution}
`Form::select()`メソッドを利用します

フィールド名を指定し、選択肢を配列で指定します

```html
{{Form::select('age', ['Under 18', '19 to 30', 'Over 30'])}}
```

この場合、valueは配列の _インデックス_ が利用されます

```html
<select name="age">
  <option value="0">Under 18</option>
  <option value="1">19 to 30</option>
  <option value="2">Over 30</option>
</select>
```

または連想配列を利用します

```html
{{Form::select('age', [
   'young' => 'Under 18',
   'adult' => '19 to 30',
   'adult2' => 'Over 30']
)}}
```

この場合、valueには連想配列のkeyが利用されます

```html
<select name="age">
  <option value="young">Under 18</option>
  <option value="adult">19 to 30</option>
  <option value="adult2">Over 30</option>
</select>
```

デフォルト値を利用する場合は第三引数に値を指定します

```html
{{Form::select('number', [0, 1, 2], 2)}}
```

次の様に出力されます

```html
<select name="number">
  <option value="0">0</option>
  <option value="1">1</option>
  <option value="2" selected="selected">2</option>
</select>
```

属性を追加する場合は、第四引数に配列を利用します

```html
{{Form::select('number', [1, 2, 3], null, ['class' => 'field'])}}
```

フィールドに`class`が追加されます

```html
<select class="field" name="number">
  <option value="0">1</option>
  <option value="1">2</option>
  <option value="2">3</option>
</select>
```

{/solution}

{discussion}
セレクトボックスの選択肢をグループ化する事も可能です

選択肢を更に連想配列等で分割することで、グループが作成されます

```html
{{Form::select('feeling', [
  'Happy' => ['Joyous', 'Glad', 'Ecstatic'],
  'Sad' => ['Bereaved', 'Pensive', 'Down'],
])}}
```

次の様なHTMLが出力されます

```html
<select name="feeling">
  <optgroup label="Happy">
    <option value="0">Joyous</option>
    <option value="1">Glad</option>
    <option value="2">Ecstatic</option>
  </optgroup>
  <optgroup label="Sad">
    <option value="0">Bereaved</option>
    <option value="1">Pensive</option>
    <option value="2">Down</option>
  </optgroup>
</select>
```
{/discussion}
