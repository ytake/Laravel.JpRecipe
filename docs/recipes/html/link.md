---
Title:    HTMLリンクを生成する
Topics:   html
Position: 6
---

{problem}
BladeテンプレートでHTMLリンクを作成したい

`<a>...</a>`タグ利用せずに、`HTML`ファサードを利用してみましょう
{/problem}

{solution}
`HTML::link()`メソッドを利用します

第一引数でURLを指定すると、URLをタイトルとして利用してHTMLリンクを生成します

```html
{{HTML::link('http://test.com')}}
```

次のHTMLが生成されます

```html
<a href="http://test.com">http://test.com</a>
```

第二引数でタイトルを追加することが出来ます

```html
{{HTML::link('http://test.com', 'testing')}}
```

次の様に生成されます

```html
<a href="http://test.com">testing</a>
```

第三引数には配列を利用して属性を追加します

```html
{{HTML::link('http://test.com', null, ['id' => 'linkid'])}}
```

`id`属性が追加されましたが、  
第二引数に`null`を指定したため、タイトルはURLに変更されます

```html
<a href="http://test.com" id="linkid">http://test.com</a>
```

第四引数は、sslのリンクを生成する場合に指定します  
URLが自動的に構築された時にのみ動作しますので注意してください(下記説明を参照)

```html
{{HTML::link('/login', 'log in', ['id' => 'linkid'], true)}}
```

以下の様に生成されます

```html
<a href="https://your.url/login" id="linkid">log in</a>
```
{/solution}

{discussion}
必要に応じて、URL部分を補完します

指定したURLが完全なものではない場合に、  
LaravelはアプリケーションのURLを利用して、ドメインを含む完全なURLを生成します

例:
* "test"を第一引数に指定すると、"http://your.url/test" として生成されます  
* "test.com"を第一引数に指定すると(スキームを指定しなかった場合)、"http://your.url/test.com" が生成されます
頭に(#)を含む場合:
* "#test"第一引数に指定すると、"#test"のまま利用されます  

これは、ページ内のリンクを生成する場合に利用します
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
