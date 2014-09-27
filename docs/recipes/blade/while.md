---
Title:    Bladeで @while を使用する
Topics:   Blade
Position: 9
---

{problem}
Bladeテンプレートでループ処理を行いたい
{/problem}

{solution}
`@while` を利用します

```html
<html>
<body>
  <p>An array of strings.</p>
  <ul>
    @while ($item = array_pop($items))
      <li>{{{ $item }}</li>
    @endforeach
  </ul>
</body>
</html>
```
{/solution}

{discussion}
特にありません
{/discussion}
