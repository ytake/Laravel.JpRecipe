---
Title:    Shutdownコールバックの登録
Topics:   callbacks
Code:     App::shutdown()
Id:       55
Position: 8
---

{problem}
アプリケーション終了直前に実装んしたコードを実行したい
{/problem}

{solution}
Shutdownでコールバック処理を実装します。

```php
App::shutdown(function() {
    // 終了間際に実行させたいコード
});
```
{/solution}

{discussion}
レスポンスが返却された直後に、Shutdownコールバックが実行されます。

記述したコードはシャットダウン処理中に実行されます。  
アプリケーションを停止させて、ログを書き込む等に利用されます。
{/discussion}
