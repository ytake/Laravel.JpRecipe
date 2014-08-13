---
Title:    認証データベースドライバのインスタンスの作成
Topics:   -
Code:     Auth::createDatabaseDriver()
Id:       213
Position: 18
---

{problem}
認証データベースドライバのインスタンスを作成したい
{/problem}

{solution}
`Auth::createDatabaseDriver()`メソッドを利用します

```php
$driver = Auth::createDatabaseDriver();
```

`$driver`変数を使って、　　
`check()`, `guest()`, `user()`などを直接利用する事が出来ます。
{/solution}

{discussion}
一般に、Auth関連では`Auth`ファサードを利用する事をお勧めします

これは、アプリケーションの設定に従って、適切なドライバをセットアップします。  
複雑なアプリケーションで、一度に複数の認証ドライバを利用する場合に、  
このメソッドを利用してインスタンスを生成して利用するとスムーズに実装できると思います。
{/discussion}
