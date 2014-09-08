---
Title:    Eloquentを利用した認証ドライバのインスタンスの作成
Topics:   -
Position: 19
---

{problem}
Eloquentを利用した認証ドライバのインスタンスを作成したい
{/problem}

{solution}
`Auth::createEloquentDriver()`メソッドを利用します

```php
$driver = Auth::createEloquentDriver();
```

`$driver`変数を使って  
`check()`, `guest()`, `user()`などを直接利用する事が出来ます
{/solution}

{discussion}
一般に、Auth関連では`Auth`ファサードを利用する事をお勧めします

これは、アプリケーションの設定に従って、適切なドライバをセットアップします  
複雑なアプリケーションで、一度に複数の認証ドライバを利用する場合に、  
このメソッドを利用してインスタンスを生成して利用するとスムーズに実装できると思います
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
