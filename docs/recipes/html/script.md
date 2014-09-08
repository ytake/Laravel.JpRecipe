---
Title:    javascriptファイルへのリンクを作成する
Topics:   html
Position: 3
---

{problem}
Bladeテンプレートでjavascriptファイルを読み込みたい

`<script ...>`利用せずに、`HTML`ファサードを利用してみましょう
{/problem}

{solution}
`HTML::script()`メソッドを利用します

引数にはjavascriptファイルへのパスを指定します

```html
{{HTML::script('js/functions.js')}}
```

次のHTMLが作成されます

```html
<script src="http://your.url/js/functions.js"></script>
```

指定したファイルパスがURLではない場合に、  
LaravelはアプリケーションのURLを利用して、ドメインを含む完全なURLでファイルパスを生成します

第二引数には配列を利用して属性を追加します

```html
{{HTML::script('js/functions.js', ['async' => 'async'])}}
```

上記を例とした場合に、下記の様にスクリプトタグに追加されます

```html
<script async="async" src="http://your.url/js/functions.js"></script>
```
{/solution}

{discussion}
HTML5では`<script>`タグの`type`属性はオプションです

現在のアプリケーションがHTML4.01でしたら、  
属性に`"type" => "text/javascript"`を追加する必要があります
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
