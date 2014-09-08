---
Title:    cssファイルへのリンクを作成する
Topics:   html
Position: 4
---

{problem}
BladeテンプレートにCSSファイルへのリンクを追加したい
{/problem}

{solution}
`HTML::style()`メソッドを利用します

スタイルシートへのパスを指定することができます。

```html
{{HTML::style('css/style.css')}}
```

次のHTMLが作成されます

```html
<link media="all" type="text/css" rel="stylesheet"
  href="http://your.url/css/style.css">
```

指定したファイルパスがURLではない場合に、  
LaravelはアプリケーションのURLを利用して、ドメインを含む完全なURLでファイルパスを生成します

第二引数には配列を利用して属性を追加します  
これを利用してデフォルトの属性を上書きすることもできます

```html
{{HTML::style('css/style.css', ['media' => 'print')]}}
```

mediaをデフォルトの`"all"`から`"print"`へ変更します

```html
<link media="print" type="text/css" rel="stylesheet"
  href="http://your.url/css/style.css">
```
{/solution}

{discussion}
とくにありません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
