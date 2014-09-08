---
Title:    メールアドレスのHTMLリンクを生成する
Topics:   html
Position: 12
---

{problem}
Bladeテンプレートで`mailto:`リンクを追加したい

スパムボットやスクリーンスクレイパーなどに収集されにくくする為にも、難読化をしてみましょう
{/problem}

{solution}
`HTML::mailto()`メソッドを利用します

第一引数は、メールアドレスを指定します

```html
{{HTML::mailto('a@b.c')}}
```

mailtoのリンクを作成し、リンクテキストとして電子メールアドレスが表示されます  
_注意:Laravelが自動的にランダムでアドレスを難読化します_  
これらはブラウザ等では正常に表示されます

```html
<a href="ma&amp;#105;&amp;#x6c;&amp;#116;o&amp;#58;&amp;#97;&amp;#64; \
  &amp;#x62;.&amp;#99;">&amp;#97;&amp;#64;&amp;#x62;.&amp;#99;</a>
```

第二引数はリンクテキストの文字列です

```html
{{HTML::mailto('a@b.c', 'Email Me')}}
```

下記の様な文字列が出力されます(ランダムですので実際の難読化は異なります)

```html
<a href="m&amp;#x61;i&amp;#108;&amp;#x74;&amp;#x6f;&amp;#x3a;&amp;#x61; \
  &amp;#x40;&amp;#98;&amp;#46;&amp;#x63;">Email Me</a>
```


属性を追加する場合は、第三引数に配列を利用します

```html
{{ HTML::mailto('a@b.c', 'Email Me', array('class' => 'btn')) }}
```

`class`が追加されます

```html
<a href="&amp;#109;&amp;#97;&amp;#105;&amp;#108;&amp;#x74;o&amp;#x3a; \
  &amp;#97;&amp;#64;b.&amp;#x63;" class="btn">Email Me</a>
```
{/solution}

{discussion}
このメソッドは`HTML::obfuscate()`を利用してメールアドレスを難読化しています

[[文字列を難読化]] をご覧ください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
