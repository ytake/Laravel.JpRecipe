---
Title:    年を選択するセレクトボックスを作成する
Topics:   form
Position: 15
---

{problem}
年を選択するセレクトボックスを作成したい
{/problem}

{solution}
`Form::selectYear()`メソッドを利用します

選択肢の範囲として、始まりの年から終わりの年までを指定します

```html
{{Form::selectYear('year', 2013, 2015)}}
```

3つの選択肢を含んだセレクトボックスが作成されます

```html
<select name="year">
  <option value="2013">2013</option>
  <option value="2014">2014</option>
  <option value="2015">2015</option>
</select>
```

デフォルト値を指定する場合は第四引数に、  
属性を追加する場合は、第五引数に配列を利用します

```html
{{Form::selectYear('year', 2013, 2015, 2014, ['class' => 'field'])}}
```

2014年が選択された状態になり、フィールドに`class`が追加されます

```html
<select class="field" name="year">
  <option value="2013">2013</option>
  <option value="2014" selected="selected">2014</option>
  <option value="2015">2015</option>
</select>
```
{/solution}

{discussion}
実際は、単純に`Form::selectRange()`をラッパーしただけのメソッドです

少しの記述でよく使われるフォームの実装が行える様に`Form::selectRange()`を利用して提供されています
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
