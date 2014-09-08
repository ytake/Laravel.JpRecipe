---
Title:    cookieを作成する
Topics:   cookies
Position: 1
---

{problem}
cookieを作りたい
{/problem}

{solution}
`Cookie::make()`を利用します

新しいクッキーを生成するには、このメソッドを使用することができます  
これはユーザーにCookieを送信せずに、単にクッキーオブジェクトを作成するという事を覚えておいて下さい

ユーザーのセッションの終了時まで利用可能なシンプルなクッキーを作成します。

```php
$cookie = \Cookie::make($name, $value);
```

有効期限をつける場合は第三引数に指定します。この例は60分間の有効期限となります

```php
$cookie = \Cookie::make($name, $value, 60);
```

もちろん通常のクッキーのパラメータを渡すこともできます

```php
$cookie = \Cookie::make($name, $value, $minutes, $path, $domain, $secure, $httpOnly);
```
{/solution}

{discussion}
cookieをどう利用したらいいですか？

生成後にユーザーに送信しますが、  
それについてのレシピを後日追加します！
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
