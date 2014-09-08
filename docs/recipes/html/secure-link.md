---
Title:    セキュアなHTMLリンクを生成する
Topics:   html, ssl
Position: 7
---

{problem}
BladeテンプレートでHTTPSのHTMLリンクを作成したい
{/problem}

{solution}
`HTML::secureLink()`メソッドを利用します

このメソッドは現在のアプリケーションへのリンクにのみ正しく動作します  
メソッドにアプリケーションのパスを指定するとHTTPSで形成されたURLを生成します

_URL_　ではなく、_パス_ を指定します

第一引数でURLを指定すると、URLをタイトルとして利用してHTMLリンクを生成します

```html
{{HTML::secureLink('x')}}
```

次のHTMLが生成されます

```html
<a href="https://your.url/x">https://your.url/x</a>
```

第二引数でタイトルを追加することが出来ます

```html
{{HTML::secureLink('a/b', 'A-B')}}
```

次の様に生成されます

```html
<a href="https://url.url/a/b">A-B</a>
```

第三引数には配列を利用して属性を追加します

```html
{{HTML::secureLink('login', 'Sign In', ['class' => 'btn'])}}
```

属性`class`が追加されます

```html
<a href="https://your.url/login" class="btn">Sign In</a>
```
{/solution}

{discussion}
このメソッドは `HTML::link()` のラッパーです

`HTML::link()`メソッドの第四引数に `true` を指定して利用しています

詳細は [[HTMLリンクを生成する]] をご覧ください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
