---
Title:    選択オプションを取得
Topics:   forms, html
Position: 29
---

{problem}
簡単に選択中の`<option>`HTMLを取得したい
{/problem}

{solution}
`Form::getSelectOption()`メソッドを利用します

このメソッドは3つの引数が利用できます:

1. `$display` - オプションの選択肢名
2. `$value` - オプションの値
3. `$selected` - 選択したオプションの値

```php
$html = Form::getSelectOption('My Option', 1, 3);
```

このサンプルの`$html` は `<option value="1">My Option</option>`になります

`$display` を配列で指定すると、選択肢が`<optgroup></optgroup>`を使用してグループ化されます
{/solution}

{discussion}
これはマクロに使用されるケースが多いでしょう

セレクトボックスを利用したマクロを実装している場合は、  
オプションを構築する際に、非常に便利なメソッドではないでしょうか？
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
