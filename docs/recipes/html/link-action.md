---
Title:    コントローラのアクションへのHTMLリンクを生成する
Topics:   html
Position: 11
---

{problem}
特定のコントローラのアクションへのリンクを生成したい
{/problem}

{solution}
`HTML::linkAction()` メソッドを利用します

指定したコントローラや、コントローラーのアクションが存在していなければなりません
また、それらは`app/routes.php`に記述されてなければなりません

第一引数はシンプルに `コントローラー@アクション` で指定します

```html
{{HTML::linkAction('Home@index')}}
```

以下の様に生成されます

```html
<a href="http://your.url/index">http://your.url/index</a>
```

第二引数でタイトルを指定することができます

```html
{{HTML::linkAction('Home@index', 'Home')}}
```

次の様に生成されます

```html
<a href="http://your.url/index">Home</a>
```

コントローラのメソッドで引数を利用する場合は、
三番目のパラメータに配列を利用して指定することができます

```html
{{HTML::linkAction('ItemController@show', 'Show Item #3', [3])}}
```

HTMLは以下のようになります(ルーティングによって異なります)

```html
<a href="http://your.url/items/3">Show Item #3</a>
```

第四引数には配列を利用して属性を追加します

```html
{{HTML::linkAction('Home@index', 'Home', [], ['class' => 'btn'])}}
```

属性`class`が追加されます

```html
<a href="http://your.url/index" class="btn">Home</a>
```
{/solution}

{discussion}
特にありません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
