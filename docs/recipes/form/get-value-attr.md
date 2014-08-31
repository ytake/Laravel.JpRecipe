---
Title:    優先度を付けた入力値の取得
Topics:   forms
Code:     Form::getValueAttribute(), Form::macro(), Form::open()
Id:       175
Position: 24
---

{problem}
通常のフォームでの値取得とフォームモデルを利用した値の取得で、
優先度をつけて取得する様にしたい

value取得の為に、フィールド名を決定しておく必要があります
{/problem}

{solution}
`Form::getValueAttribute()`メソッドを利用します

```php
$value = Form::getValueAttribute($fieldname);
```

値が取得できない場合は`null`が返却され、
取得可能であれば、その値が返却されます

フォームモデルを利用している場合は、
モデルの値よりも優先して値を指定することができます

```php
$value = \Form::getValueAttribute($fieldname, $value);
```

セッションデータにこの値が存在する場合は、優先されて取得され、
2番目の引数に値を指定すると、モデルのデータよりも優先される様になります

See [[モデルをベースにしたフォームを作成する]].
{/solution}

{discussion}
これはマクロに使用されるケースが多いでしょう

フィールドに値を割り当てることで、優先順を変更する事が出来ます
この優先順については [[モデルをベースにしたフォームを作成する]] をご覧ください

`Form::getValueAttribute()`は、優先順位に従って値を使用することができます

マクロについては [[Formマクロを作成する]] レシピをご覧ください
{/discussion}
