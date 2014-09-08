---
Title:    認証で利用されるCookieJarを取得する
Topics:   -
Position: 30
---

{problem}
アプリケーションの認証で利用されるCookieJarを取得したい
{/problem}

{solution}
`Auth::getCookieJar()`メソッドを利用します

```php
$cookies = Auth::getCookieJar();
```

CookieJarを利用していない場合は、  
`RuntimeException`がスローされる事に注意してください
{/solution}

{discussion}
一般的には、`Cookie`を利用する事をお勧めします

デフォルトでは、Laravelは`Cookie`ファサードと`Auth`ファサードの両方に同じクッキードライバを使用しています  
アプリケーションが明示的にCookieJarを設定されていない限り、  
クッキーを扱う場合は`Cookie`ファサードを使用する方が簡単です
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
