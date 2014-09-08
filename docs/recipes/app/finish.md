---
Title:    App::Finishコールバックの登録方法
Topics:   -
Position: 18
---

{problem}
リクエスト処理後にアプリケーションが終了する前に任意の処理を実装したい
{/problem}

{solution}
`App::finish()`メソッドを利用して、コールバック処理を実装することができます

```php
\App::finish(function($request, $response) {

    // リクエストやレスポンスの内容を使って、
    // 処理内容をログに出力したり、様々な処理を記述できます
});
```

`$request`と`$response`はコールバックで利用しますが、  
そのものは変更されないため、アプリケーションには影響しません
{/solution}

{discussion}
どこでコールバックを登録できるのでしょうか？

`App::finish()`はサービスプロバイダーをはじめ、  
`app/start/global.php`などに記述しておけば、実行されます  
"どこのファイルに書けばいいですか？"という質問が多いですが、  
これらは処理の中でも遅い段階で実行されるため、  
ファイルの設置場所や、記述場所は気にせず記述することができます

[[リクエストのライフサイクルについて理解する]]を参考にしてみてください  
最後のステップである **実行手順** に記述されています  
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
