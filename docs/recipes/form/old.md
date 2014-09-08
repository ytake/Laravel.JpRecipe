---
Title:    セッションから前の入力値を取得する
Topics:   forms
Position: 25
---

{problem}
ページを再表示した時に、以前入力した値を取得したい

Laraveはフィールドの値をセッションに保存し、  
ページを再表示した場合等に、以前の入力値を取得する事が出来ます
{/problem}

{solution}
`Form::old()`メソッドを利用します

```php
$value = \Form::old('fieldname');
```

実行しても、以前の値がセッションに含まれていなければ`null`が返却されます

フォーム送信先のページ等で、値をセッションに含めるなどをすると値を取得できます

```php
return \Redirect::to('リダイレクト先')->withInput();
```
{/solution}

{discussion}
これはマクロに使用されるケースが多いでしょう

入力エラーなどの場合において、  
エラーメッセージ表示と、ユーザーの入力した値を再利用してフォームを再描画する場合等に利用されるでしょう

ただし、再利用は一回だけです

[[優先度を付けた入力値の取得]] も参考にして下さい
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
