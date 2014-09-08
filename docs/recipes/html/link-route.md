---
Title:    名前付きルートへのHTMLリンクを生成する
Topics:   html
Position: 10
---

{problem}
ルートへのリンクを生成したい
{/problem}

{solution}
`HTML::linkRoute()` メソッドを利用します

第一引数にルートの名前を指定します

```html
{{HTML::linkRoute('login')}}
```

上記の様な指定の場合は `app/routes.php`ファイルに  
`login`と名付けられているルートが存在していなければなりません

```html
<a href="http://your.url/user/login">http://your.url/user/login</a>
```

指定した名前付きルートが存在しない場合は、エラーがスローされます

第二引数でタイトルを指定することができます

```html
{{HTML::linkRoute('login', 'Sign In')}}
```

以下の様に生成されます(ルーティングによって異なります)

```html
<a href="http://your.url/user/login">Sign In</a>
```

引数を利用する場合は、三番目のパラメータに配列を利用して指定することができます

```html
{{HTML::linkRoute('items.show', 'Show item #4', [4])}}
```

次の様に生成されます

```html
<a href="http://your.url/items/4">Show item #4</a>
```

第四引数には配列を利用して属性を追加します

```html
{{HTML::linkRoute('login', 'Sign In', [], ['class' => 'btn'])}}
```

属性`class`が追加されます

```html
<a href="http://your.url/user/login" class="btn">Sign In</a>
```
{/solution}

{discussion}
特にありません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
