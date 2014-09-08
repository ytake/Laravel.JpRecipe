---
Title:    フィールド名のID属性を取得する
Topics:   forms
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
これはマクロに使用されるケースが多いでしょう

フォームマクロについては、  
[[Formマクロを作成する]] レシピを参考にしてください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
