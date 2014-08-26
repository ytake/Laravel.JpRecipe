---
Title:    値を暗号化する
Topics:   encryption
Code:     Config::get(), Crypt::encrypt(), Crypt::setKey()
Id:       105
Position: 1
---

{problem}
文字列を暗号化したい

パスワード等のプライベートなデータを暗号化してみましょう
{/problem}

{solution}
`Crypt::encrypt()`を利用します

```php
$encrypted = \Crypt::encrypt($value);
```
{/solution}

{discussion}
複合化する場合に、暗号化に使用したキーを使う必要が有ります。

Laravelの暗号化ルーチンで、
内部で`Config::get('app.key')`をコールして利用しています。
この値は、必ずアプリケーション毎で異なる値を設定して利用してください。

または、

暗号化利用前に`Crypt::setKey()`をコールする必要が有ります。
これを利用して、暗号化前に使用する値を設定します。
[[暗号化キーを設定する]] をご覧下さい
{/discussion}
