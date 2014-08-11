---
Title:    簡単でシンプルなミドルウェアクラスを作成
Topics:   middleware
Code:     -
Id:       114
Position: 2
---

{problem}
アプリケーションにミドルウェアクラスを追加したいが、どこに置くべきなのかわからない
{/problem}

{solution}
簡単なミドルウェアクラスを作ってみましょう

#### Step 1 - クラスを作りましょう

```php
<?php
namespace MyApp;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class Middleware implements HttpKernelInterface
{

    /** @var HttpKernelInterface */
    protected $app;

    /**
     * Constructor
     * @param HttpKernelInterface $app
     */
    public function __construct(HttpKernelInterface $app)
    {
        $this->app = $app;
    }

    /**
     * Handle the request, return the response
     *
     * @implements HttpKernelInterface::handle
     *
     * @param  \Symfony\Component\HttpFoundation\Request  $request
     * @param  int   $type
     * @param  bool  $catch
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request,
        $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
    {
        // 1) Modify incoming request if needed
        // ...

        // 2) Chain the app handler to get the response
        $response = $this->app->handle($request, $type, $catch);

        // 3) Modify the response if needed
        // ...

        // 4) Return the response
        return $response;
    }
}
```

#### Step 2 - ミドルウェアクラスを登録しましょう

サービスプロバイダの`register()`メソッドに記述します

```php
\App::middleware('MyApp\Middleware');
```

[Laravel-Hooks](https://github.com/ChuckHeintzelman/Laravel-Hooks)パッケージを使用して、  
簡単に追加することもできます
{/solution}

{discussion}
上記で実装したクラスは特に何も実行されません

簡単な作成方法と、設置場所を学習しました。  
実際に追加等をする場合は、アプリケーションの規約等に従い、  
名前空間やクラス名を任意の名前で実装してください。

`handle()`メソッドを利用して、ログ出力等を実装してテストや動作確認などを行って見ましょう。  
```php
// In step #1) リクエスト内容を変更してみましょう

// ファイルにログを出力します。 app/start/global.php はまだ実行されていません。
// そのため、Logファサードはまだ動作しません
// 直接ログに出力してみます
$logfile = storage_path().'/logs/laravel.log';
error_log("Middleware entry\n", 3, $logfile);

// In step #2) レスポンスを変更してみましょう

// ファイルにログ出力します. 先ほどの例とは違い、Logファサードは動作します。
// `app/start/global.php`でログ関連の設定をする必要があります。
\Log::info("Middleware exit");
```
実際に動作しているかどうかは、`app/storage/logs/laravel.log`で確認する事ができます
{/discussion}
