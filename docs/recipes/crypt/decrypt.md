---
Title:    値を複合化する
Topics:   encryption
Position: 2
---

{problem}
文字列を複合化したい

Laravelで文字列を暗号化する事ができます  
暗号化したものを今度は複合化してみましょう
{/problem}

{solution}
`Crypt::decrypt()`を利用します

```php
$value = \Crypt::decrypt($encrypted);
```
{/solution}

{discussion}
複合化する場合は、  
暗号化する為に利用したキーと同じものを利用して  
複合化しなければなりません

Laravelの暗号化ルーチンで、  
内部で`Config::get('app.key')`をコールして利用しています  
この値は、必ずアプリケーション毎で異なる値を設定して利用してください

または、

暗号化利用前に`Crypt::setKey()`をコールする必要が有ります  
これを利用して、暗号化前に使用する値を設定します  
[[暗号化キーを設定する]] をご覧下さい
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
