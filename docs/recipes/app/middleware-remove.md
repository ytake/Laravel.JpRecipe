---
Title:    アプリケーションからミドルウェア(HttpKernel)を削除する
Topics:   middleware
Code:     App::forgetMiddleware()
Id:       112
Position: 13
---

{problem}
ミドルウェアの一部を削除したい
{/problem}

{solution}
`App::forgetMiddleware()`メソッドを利用します

```php
// 独自のクラスを登録してある場合はそれを指定します
\App::forgetMiddleware('MyApp\Middleware');

// LaravelのFrameGuardクラスを削除します
\App::forgetMiddleware('Illuminate\Http\FrameGuard');
```
{/solution}

{discussion}
ローレベルのメソッドですが、実行する場合はリクエストのライフサイクルの中でも早いうちに実行しなければなりません  

記述する具体的な場所は、サービスプロバイダーの`register()`に記述します。  
`register()`の後に呼ばれるメソッドなどでは、効果がありません

[[リクエストのライフサイクルについて理解する]]の、"Build stacked HTTP Kernel"の部分が該当します。  

ただし、次のクラスは削除する事ができません:

* `Illuminate\Cookie\Guard`
* `Illumiante\Cookie\Queue`
* `Illuminate\Session\Middleware`

これらはLaravelのコアクラスの為、削除はできません
{/discussion}
