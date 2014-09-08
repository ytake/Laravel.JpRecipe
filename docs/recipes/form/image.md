---
Title:    画像ボタンを作成する
Topics:   forms
Position: 20
---

{problem}
Bladeテンプレートで画像ボタンを作成したい
{/problem}

{solution}
`Form::image()`メソッドを利用します

第一引数で画像のurlを必ず指定しなければなりません

```html
{{Form::image('images/submit-button.jpg')}}
```

これは下記の様に出力されます

```html
<input src="http://your.url/images/submit-button.jpg" type="image">
```

_Note: ドメインを含めた完全なURLを指定しない場合は、現在のアプリケーションのURLが補完されて利用します_

フィールド名を指定する場合は第二引数で指定します

```html
{{Form::image('images/submit-button.jpg', 'btnSub')}}
```

_name_ 属性を追加して出力されます

```html
<input src="http://your.url/images/submit-button.jpg"
  name="btnSub" type="image">
```

属性を追加する場合は、第二引数に配列を利用する事が出来ます

```html
{{Form::image('images/submit-button.jpg', 'btnSub', ['class' => 'btn'])}}
```

属性`class`が追加されます

```html
<input class="btn" src="http://your.url/images/submit-button.jpg"
  name="btnSub" type="image">
```
{/solution}

{discussion}
特にありません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
