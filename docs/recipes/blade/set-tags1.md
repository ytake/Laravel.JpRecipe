---
Title:    Bladeが使用するタグを変更する
Topics:   -
Code:     Blade::setContentTags()
Id:       246
Position: 18
---

{problem}
Bladeのタグにデフォルトとは異なるものを利用したい
You want to use different content tags in your Blade template.

Bladeは`{{` と `}}` を利用して内容を表示しますが、
同じ`{{` と `}}`を使うMustache, AngularJSなどと衝突することになります
衝突を避ける様にこれらを変更してみましょう
{/problem}

{solution}
`Blade::setContentTags()`メソッドを利用します

例えば、タグに`[%` と `%]`を利用するとしましょう
まずはメソッドをコールします

```php
\Blade::setContentTags('[%', '%]');
```

テンプレートで利用する場合は下記の様になります

```html
The value of $variable is [% $variable %].
```

コンテンツのエスケープを行う場合は、第二引数に`true`を指定します

```php
\Blade::setContentTags('[-%', '%-]', true);
```

`{{{` と `}}}` を設定した `[-%` and `%-]`　が利用できる様になります

```html
The value of $variable is [-% $variable %-].
```
{/solution}

{discussion}
viewが使われる前に`Blade::setContentTags()`をコールしなければなりません

実装に最適な場所は、サービスプロバイダー、または`app/start/global.php`です
{/discussion}
