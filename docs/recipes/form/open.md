---
Title:    HTMLフォームを作成する
Topics:   forms
Code:     Form::open()
Id:       124
Position: 1
---

{problem}
フォームを作成しましょう

HTMLの`<form>`タグではなく、Laravelの`Form`ファサードを利用してみましょう
{/problem}

{solution}
`Form::open()`メソッドを利用します

通常はBladeテンプレートで利用します
利用にあたっていくつか方法があります

#### デフォルト値を利用

```html
{{Form::open()}}
```

生成されるHTMLは下記の通りです

```html
<form method="POST" action="http://currenturl" accept-charset="UTF-8">
<input name="_token" type="hidden" value="somelongrandom string">
```

POSTメソッドを使用してフォームを開始し、
actionに現在のURLを用いて、`accept-charset="UTF-8"`を追加します
また、CSRF対策にtokenが追加されます

#### URLを指定します

URLを指定する場合に、`action`ではなく`url`キーを利用して指定します
なお`Form::open()`で利用可能な引数は配列のみです

```html
{{Form::open(['url' => 'http://full.url/here'])}}
```

生成されるHTMLは下記の通りです

```html
<form method="POST" action="http://full.url/here" accept-charset="UTF-8">
<input name="_token" type="hidden" value="somelongrandom string">
```

#### ルーティングを利用する

ルーティングを利用した指定をする場合は、
`action`ではなく`route`キーを利用して、ルーティング名を指定します

{html}
{{Form::open(['route' => 'named.route'])}}
{/html}

作成されていないルーティング名を指定した場合は、エラーが返却されます
それ以外では、ルーティング名から完全のURLlを生成します

```html
<form method="POST" action="http://full.url/someplace" accept-charset="UTF-8">
<input name="_token" type="hidden" value="somelongrandom string">
```

#### アクションでコントローラーを指定する

`action`で指定します

```html
{{Form::open(['action' => 'Controller@method'])}}
```

コントローラまたはそのメソッドが存在しない場合、エラーが返却されます
それ以外では、指定されたコントローラとメソッドから完全なURLを生成します

```html
<form method="POST" action="http://full.url/someplace" accept-charset="UTF-8">
<input name="_token" type="hidden" value="somelongrandom string">
```

#### HTTPメソッドを指定する

もちろん、HTTPメソッドはPOST以外のものも利用可能です
配列で'method'キーを利用して指定します
利用可能なHTTPメソッドは、'get', 'put', 'patch', 'post', そして 'delete'です

```html
{{Form::open(['method' => 'get'])}}
```

生成されるHTMLは下記の通りです

```html
<form method="GET" action="http://currenturl" accept-charset="UTF-8">
```

GETメソッドではtokenが追加されない事に注意して下さい

#### ファイルのアップロードを指定する

'files'キーを使って、`'files' => true`と指定すると、
フォームはファイルアップロードをサポートします

```html
{{Form::open(['files' => true])}}
```

フォームに`enctype="multipart/form-data"`属性が追加されます

```html
<form method="POST" action="http://currenturl" accept-charset="UTF-8"
  enctype="multipart/form-data">
<input name="_token" type="hidden" value="somelongrandom string">
```
{/solution}

{discussion}
ブラウザが処理できないHTTPメソッドを どうやってLaravelは処理をするのでしょうか？

ほとんどのブラウザはPUT, PATCH, DELETEメソッドは処理できません
それらが指定された場合、Laravelはhiddenフィールドに`method="POST"`を追加します

```html
{{Form::open(['method' => 'PUT'])}}
```

生成されるHTMLは下記の通りです

```html
<form method="POST" action="http://currenturl" accept-charset="UTF-8">
<input name="_method" type="hidden" value="PUT">
<input name="_token" type="hidden" value="somelongrandom string">
```

フレームワークは希望通りのHTTPメソッドを指定ながらも、
hiddenフィールドを利用して、処理をサポートしてくれますので、
特に意識する必要はありません
{/discussion}
