---
Title:    文字列を難読化
Topics:   html
Code:     HTML::obfuscate()
Id:       197
Position: 17
---

{problem}
Webページ上の文字列がスパムボットに収集されるのを防ぎたい。
{/problem}

{solution}
`HTML::obfuscate()`メソッドを利用します

このメソッドは、ランダムにHTMLエンティティを文字列内の文字を置き換えます
この文字列は、ブラウザ等では正しく表示されますが、
多くのスクリーンスクレーパーにはごみとして扱われます

電子メールアドレスのために頻繁に利用されるでしょう
たとえば...

```html
{{-- Blade template --}}
{{HTML::obfuscate('me@gmail.com')}}
```

下記のように出力されます

```html
&amp;#x6d;&amp;#x65;&amp;#x40;&amp;#x67;&amp;#x6d;&amp;#97;i&amp;#x6c;. \
  &amp;#99;&amp;#x6f;&amp;#x6d;
```
{/solution}

{discussion}
これは`HTML::email()` と `HTML::mailto()`の両方で利用しています

これを用いて電子メールを難読化します [[メールアドレスを難読化]]、
[[メールアドレスのHTMLリンクを生成する]] をご覧ください
{/discussion}
