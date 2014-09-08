---
Title:    Bladeテンプレートで他言語対応をする
Topics:   Blade
Position: 20
---

{problem}
Bladeテンプレートで他言語対応をしたい
{/problem}

{solution}
`@lang` 構文を利用します

サンプル:

```html
@lang('messages.welcome')
```

現在のロケールの`messages.php`に`welcome`キーがあれば、  
ロケールに合わせたメッセージが出力されます

現在のロケールに含まれない場合はそのまま`messages.welcome`が出力されます

メッセージにプレースホルダが利用されている場合は、  
第二引数に配列を使って指定します

```html
@lang('messages.welcome', ['name' => $name])
```
{/solution}

{discussion}
このBlade構文は`Lang::get()`を利用します

このメソッドの詳細については [[キーに対応する多言語翻訳文字列を取得する]] をご覧ください
{/discussion}
