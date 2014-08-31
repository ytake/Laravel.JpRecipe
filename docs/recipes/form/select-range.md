---
Title:    選択肢の範囲を指定してセレクトボックスを作成する
Topics:   form
Code:     Form::selectRange
Id:       164
Position: 14
---

{problem}
選択肢の範囲を指定してセレクトボックスを作成したい
{/problem}

{solution}
`Form::selectRange()`メソッドを利用します

選択肢の範囲として、始まりの値から終わりの値までを整数で指定します

```html
{{Form::selectRange('number', 10, 15)}}
```

10から15までの選択肢を含んだセレクトボックスが作成されます

```html
<select name="number">
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
</select>
```

デフォルト値を指定する場合は第四引数に、
属性を追加する場合は、第五引数に配列を利用します

```html
{{Form::selectRange('number', 10, 15, 13, ['class' => 'field'])}}
```

#13 が選択された状態になり、フィールドに`class`が追加されます

```html
<select class="field" name="number">
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13" selected="selected">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
</select>
```
{/solution}

{discussion}
内部で`Form::select()`をコールしています

詳細については [[セレクトボックスを作成する]] をご覧ください
{/discussion}
