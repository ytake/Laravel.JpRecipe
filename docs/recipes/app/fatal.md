---
Title:    Fatalエラーのエラーハンドリング
Topics:   -
Code:     App::error(), App::fatal()
Id:       206
Position: 24
---

{problem}
Fatalエラー処理を独自に実装したい
{/problem}

{solution}
`App::fatal()`を使ってハンドラーを登録します

これは`FatalErrorException`をインターセプトします。  
このエクセプションは具体的には`Symfony\Component\Debug\Exception\FatalErrorException`がスローされます

```php
App::fatal(function($exception) {
    die('FATAL ERROR: '.$exception->getMessage());
});
```
{/solution}

{discussion}
Fatalエラー例外処理には注意が必要です。  

動作しない場合、いくつかの考えられる原因があります：

* `php.ini` で `display_startup_errors` がonになっていない
* Laravelの基盤となるコアクラスなどでエラーが発生している
* エラーを100%処理するのは様々な要因があり、難しい場合がある

`E_ERROR`,`E_CORE_ERROR`,`E_COMPILE_ERROR` または `E_PARSE`、これらのFatalエラーはPHPの設定で定義されています。

未定義の例外が原因でアプリケーションが終了した時に、LaravelはFatalエラーをスローします。
{/discussion}
