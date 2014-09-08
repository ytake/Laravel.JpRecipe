---
Title:    以前の入力値が空かどうかを確認する
Topics:   forms
Position: 26
---

{problem}
以前の入力値があるかどうかを確認したい  
(前回 フォームに送信したデータを指します)
{/problem}

{solution}
`Form::oldInputIsEmpty()`メソッドを利用します

```php
if (!\Form::oldInputIsEmpty()) {
    // フィールドを指定してチェックしてみましょう
}
```
{/solution}

{discussion}
[[セッションから前の入力値を取得する]] も参考にして下さい
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
