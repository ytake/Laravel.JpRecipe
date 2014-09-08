---
Title:    Bladeで @foreach を使用する
Topics:   Blade
Position: 8
---

{problem}
Bladeテンプレートで配列のループを使用したい
{/problem}

{solution}
`@foreach` 構文を利用します

```html
<html>
<body>
  <p>A list of items.</p>
  <ul>
    @foreach ($items as $item)
      <li>{{{ $item }}</li>
    @endforeach
  </ul>
</body>
</html>
```

PHPのforeachの様にループでキーを使用する事が出来ます

```html
<html>
<body>
  <p>A dictionary.</p>
  <dl>
    @foreach ($dict as $word => $meaning)
      <dt>{{{ $word }}}</dt>
      <dd>{{{ $meaning }}</dd>
    @endforeach
  </dl>
</body>
</html>
```
{/solution}

{discussion}
未定義の変数に注意して下さい

サンプルの様に利用する場合に、`$items`や`$dict`が未定義の場合は  
PHPと同様に警告メッセージが出力されます
{/discussion}
