---
Title:    認証で利用するリクエストクラスのインスタンスを設定する
Topics:   -
Position: 39
---

{problem}
認証で利用するリクエストクラスを別のものにしたい
{/problem}

{solution}
`Auth::setRequest()`メソッドを利用します

```php
\Auth::setRequest($request);
```

必ず`\Symfony\Component\HttpFoundation\Request`を利用して実装しなければなりません
{/solution}

{discussion}
このメソッドは、テストで必要とされると思います

ほとんどの場合に、Laravelによって作成された標準的な要求だけで正常に動作します  
`Auth`ファサードが使用するディスパッチャは`Request`ファサードが使用するものと同じものです

独自のリクエストクラス等を使用する場合は、この方法を利用してみてください  
認証ルーチンが実行される前に、このメソッドが実行されるようにします  
実装する場合は、サービスプロバイダーまたは `app/start/global.php`を利用しましょう
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
