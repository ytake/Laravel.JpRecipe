---
Title:    Bladeで @unless を使用する
Topics:   Blade
Position: 5
---

{problem}
Bladeテンプレートで条件付きロジックを利用したい

条件付きのロジックは`@if(!condition)`を利用する事が出来ますが、  
条件が偽の場合に、よりエレガントな方法を使ってみましょう
{/problem}

{solution}
`@unless` を利用します

```html
@unless ($age >= 18)
    You can't vote.
@endunless
```
{/solution}

{discussion}
とてもシンプルです

Bladeの内部で`@unless(condition)`は、`if(!condition)`に変換して利用しています
{/discussion}
