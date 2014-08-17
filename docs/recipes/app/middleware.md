---
Title:    ミドルウェア(HttpKernel)を登録する
Topics:   middleware
Code:     App::middleware()
Id:       111
Position: 12
---

{problem}
ローレベルで、リクエストやレスポンスを独自に変更したい

`before filters`または`after filters`を学習してある事が前提ですが、  
これらはローレベルで有りながらもアプリケーションでグローバルに作用します
{/problem}

{solution}
`App::middleware()`メソッドを利用します

まず、ミドルウェアクラス `MyApp\Middleware` として、クラスを登録します。

```php
\App::middleware('MyApp\Middleware');
```

`MyApp\Middleware`クラスはアプリケーション内に設置してなければいけません。

登録するクラスのコンストラクタで引数が必要な場合は、  
次の様に指定する事ができます

```php
// 引数が1つ
\App::middleware('MyApp\Middleware', [$arg1]);

// 引数が2つ以上
\App::middleware('MyApp\Middleware', [$arg1, $arg2]);
```
{/solution}

{discussion}
ミドルウェアの処理が実行される場所を知るのは、重要なポイントの一つです
[[Understanding the Request Lifecycle]]を参考にしてください  

ミドルウェアに関連するレシピは下記のものです:

* [[ミドルウェアについて理解する]]
* [[簡単でシンプルなミドルウェアクラスを作成する]]
{/discussion}
