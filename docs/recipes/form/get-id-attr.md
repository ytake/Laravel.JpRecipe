---
Title:    フィールド名のID属性を取得する
Topics:   forms
Code:     Form::getIdAttribute(), Form::macro()
Id:       174
Position: 23
---

{problem}
フィールド名のID属性を確認したい
{/problem}

{solution}
`Form::getIdAttribute()`メソッドを利用します

```php
$id = \Form::getIdAttribute('fieldname', $attributes);
```

フィールドにIDがあればIDを返却し、
フィールドにIDが無い場合は、`null`を返却します
{/solution}

{discussion}
これはしばしばマクロに使用されるケースがあります

フォームマクロについては、 [[Formマクロを作成する]] レシピを参考にしてください
{/discussion}
