---
Title:    メールアドレスを難読化
Topics:   html
Position: 13
---

{problem}
スパムボットなどに収集されるのを防ぐために電子メールアドレスを難読化したい
{/problem}

{solution}
`HTML::email()`メソッドを利用します

このメソッドで指定するのは、メールアドレスだけです

```php
$email = \HTML::email('me@local.com');
```

`$email`はブラウザでは正しく表示されますが、
読みづらい文字列が含まれる様になります

```html
Email is <b>&amp;#x6d;e&amp;#x40;l&amp;#111;ca&amp;#x6c;.c&amp;#x6f;m</b>
```
{/solution}

{discussion}
このメソッドは`HTML::obfuscate()`を利用して難読化されています

[[文字列を難読化]] をご覧ください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
