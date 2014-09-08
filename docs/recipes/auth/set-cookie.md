---
Title:    認証で利用するCookie Jarを設定する
Topics:   -
Position: 31
---

{problem}
認証だけで利用するCookieを作成したい
{/problem}

{solution}
`Auth::setCookieJar()`メソッドを利用します

```php
\Auth::setCookieJar($cookie_jar);
```

Cookie Jarは`Illuminate\Cookie\CookieJar`を使って実装しなければなりません
{/solution}

{discussion}
これは高度なトピックです

ほとんどの場合は、Laravelによって作成された標準のcookieハンドラだけで正常に動作します  
`Auth`ファサードが使用するCookie Jarは、`Cookie`ファサードが使用するものと同じものです

標準のcookieプロバイダー以外のものを利用する場合にこの実装方法を利用します  
認証ルーチンが実行される前に、このメソッドが実行されるようにします  
実装する場合は、サービスプロバイダーか、`app/start/global.php`を利用しましょう
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
