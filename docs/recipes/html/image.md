---
Title:    HTMLイメージタグを生成する
Topics:   html
Position: 5
---

{problem}
Bladeテンプレートに画像を追加したい

`<img...>`タグ利用せずに、`HTML`ファサードを利用してみましょう
{/problem}

{solution}
`HTML::image()`メソッドを利用します

必要な引数は、画像へのパスです

```html
{{HTML::image('img/picture.jpg')}}
```

次のHTMLが生成されます

```html
<img src="http://your.url/img/picture.jpg">
```

指定したファイルパスがURLではない場合に、
LaravelはアプリケーションのURLを利用して、ドメインを含む完全なURLでイメージへのパスを生成します

第二引数で`alt`属性を追加する事が出来ます

```html
{{HTML::image('img/picture.jpg', 'a picture')}}
```

次のHTMLが生成されます

```html
<img src="http://your.url/img/picture.jpg" alt="a picture">
```

第三引数には配列を利用して属性を追加します

```html
{{HTML::image('img/picture.jpg', 'a picture', ['class' => 'thumb'])}}
```

Now the HTML contains a class attribute.

```html
<img src="http://your.url/img/picture.jpg" class="thumb" alt="a picture">
```
{/solution}

{discussion}
特にありません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
