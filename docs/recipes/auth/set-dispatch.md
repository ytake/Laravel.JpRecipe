---
Title:    認証のためのイベントディスパッチャー設定
Topics:   -
Position: 37
---

{problem}
認証で専用のイベントディスパッチャーを使用したい
{/problem}

{solution}
`Auth::setDispatcher()`メソッドを利用します

```php
\Auth::setDispatcher($events);
```

`Illuminate\Events\Dispatcher`を利用して実装しなければなりません
{/solution}

{discussion}
これは高度なトピックです

ほとんどの場合に、Laravelで用意されている標準的なイベントディスパッチャだけで正常に動作します  
`Auth`ファサードが使用するディスパッチャは、  
`Event`ファサードが使用するものと同じものです

独自のディスパッチャを使用する場合は、この方法を利用してみてください  
認証ルーチンが実行される前に、このメソッドが実行されるようにします  
実装する場合は、サービスプロバイダーまたは `app/start/global.php`を利用しましょう
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
