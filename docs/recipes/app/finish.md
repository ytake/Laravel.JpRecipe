---
Title:    App::Finishコールバックの登録方法
Topics:   -
Code:     App::finish()
Id:       200
Position: 18
---

{problem}
リクエスト処理後にアプリケーションが終了する前に任意の処理を実装したい
{/problem}

{solution}
`App::finish()`メソッドを利用して、コールバック処理を実装することができます

```php
App::finish(function($request, $response) {

    // リクエストやレスポンスの内容を使って、
    // 処理内容をログに出力したり、様々な処理を記述できます
});
```

**注意** `$request`と`$response`はコールバックで利用しますが、  
そのものは変更されないため、アプリケーションには影響しません
{/solution}

{discussion}
Where do you register the callbacks?

You can put the `App::finish()` call in a service provider or even `app/start/global.php`. Since any callbacks are not called until late in the process the question _"Where to put them?"_ doesn't matter too much.

Look at [[Understanding the Request Lifecycle]]. The second to last step in the section labeled **The Running Steps** shows when this is called.
{/discussion}
