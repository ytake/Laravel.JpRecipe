---
Title:    フィルター"After"を実装する
Topics:   filters
Code:     App::after()
Id:       54
Position: 7
---

{problem}
リクエスト後に、毎回実行される処理を実装したい(ControllerやRoute等)
{/problem}

{solution}
フィルターの"after"をフレームワークに登録します。

```php
\App::after(function($request, $response) {
    // 実行後にレスポンスを書き出す例
    $content = $response->getContent();
    \File::put(storage_path().'/logs/last_response.txt', $content);
});
```
{/solution}

{discussion}
レスポンスは任意で自由に変更する事ができます。

このフィルターはレスポンスのオブジェクトを受け取った後に実行される為、  
レスポンスをフィルター内で変更する事ができます  
こちらも参考にしてみて下さい [[リクエストのライフサイクルについて理解する]]  
アプリケーション処理後に実行されるフィルターについて、理解を深める事ができます。
{/discussion}
