---
Title:    Bladeが使用するエスケープタグを変更する
Topics:   -
Code:     Blade::setEscapedContentTags()
Id:       247
Position: 19
---

{problem}
Bladeのエスケープタグにデフォルトとは異なるものを利用したい

Bladeは`{{{` と `}}}` を利用して内容を表示しますが、
他のタグに変更してみましょう
{/problem}

{solution}
`Blade::setEscapedContentTags()`メソッドを利用します

例えば、タグに`[{{` と `}}]`を利用するとしましょう
まずはメソッドをコールします

```php
\Blade::setContentTags('[{{', '}}]');
```

テンプレートで利用する場合は下記の様になります

```html
The value of $variable is [{{ $variable }}].
```

`$variable`は、`HTML::entities()`を介して出力されます
{/solution}

{discussion}
実際には`Blade::setContentTags()`が利用されています

第三引数に`true`を指定して利用しています [[Bladeが使用するタグを変更する]]
{/discussion}
