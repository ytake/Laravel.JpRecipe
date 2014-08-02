---
Title:    Booting、Booted Callbacksを登録する
Topics:   callbacks
Code:     App::booted(), App::booting()
Id:       103
Position: 11
---

{problem}
アプリケーション起動中になにかを動作させたい

アプリケーションが起動される直前、  
または直後に特定のタスクを実行するサービスプロバイダがあります
{/problem}

{solution}
`App::booting()` または `App::booted()` を利用します

{php}
App::booted(function($app)
{
    // アプリケーション起動前に実行されます
});
App::booting(function($app)
{
    // アプリケーション起動後に実行されます
})
{/php}
{/solution}

{discussion}
リクエストのライフサイクルを理解しましょう

1. まず最初に全てのサービスプロバイダが起動されます
2. 次に、`booting()`がコールされます
3. 最後に`booted()`がコールされます

[[Understanding the Request Lifecycle]]をご覧下さい
{/discussion}
