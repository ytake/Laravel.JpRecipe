---
Title:    Bladeで @for を使用する
Topics:   Blade
Position: 7
---

{problem}
Bladeテンプレートでループを使用したい
{/problem}

{solution}
`@for` 構文を利用します

```html
<html>
<body>
  <p>I can count to 10.</p>
  @for ($i = 1; $i <= 10; $i++)
    <p>{{ $i }}</p>
  @endfor
</body>
</html>
```
{/solution}

{discussion}
PHPの `for` と同様のものです

`<?php`タグを利用しませんので、綺麗です
{/discussion}
