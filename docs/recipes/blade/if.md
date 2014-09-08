---
Title:    Bladeで @if を使用する
Topics:   Blade
Position: 4
---

{problem}
Bladeテンプレートで条件付きロジックを利用したい
{/problem}

{solution}
`@if` を利用します

```html
@if ($age < 6)
    子供は飲めません
@elseif ($age < 18)
    お酒は20歳以上から
@else
    どこでお酒が買えますか？
@endif
```
{/solution}

{discussion}
特にありません
{/discussion}
