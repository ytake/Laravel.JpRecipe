---
Title:    シンプルなサービスプロバイダーを作成する
Topics:   service providers
Position: 1
---

{problem}
サービスプロバイダーを作りたいが、どうしたらいいのかわからない
{/problem}

{solution}
最も簡単なサービスプロバイダーを作成してみましょう  
サービスプロバイダーとはどのようなものなのでしょうか？  
これは、フレームワークがリクエストを受けた初期の段階でフレームワークに組み込まれる、  
フレーウワークを構成するための仕組みです  
開発時に利用しているファサードや、フォームリクエストなど  
Laravelを構成するものがこのサービスプロバイダーを利用して構築されます  

実際に機能を追加してみましょう

サービスプロバイダーは下記のコマンドで作成することができます

```bash
$ artisan make:provider SomethingServiceProvider
```

コマンド実行後、`app/Providers`配下にクラスが作成されます


```php
<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SomethingServiceProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }

    public function register()
    {
        //
    }
}

```
次に、`config/app.php`の`providers[]`配列に今作成したクラスを追加します

```php
    'providers' => [
        'App\Providers\SomethingServiceProvider',
    ],
```

これだけで、サービスプロバイダーが登録され、  
任意の処理をコンテナへ登録したり、または初期の段階で実行されるコードを挿入することができます  

{/solution}

{discussion}
紹介したこのサービスプロバイダーは何も実装していないので、何もしません

Laravelによって`register()`メソッドが実行されますが、何も起こりません  
例外や、何か出力される様な処理を実装する事で、期待通りに実行されるという事が確認できます

ポイントとしては、これがサービスプロバイダーの一番ベーシックな部分と云う事です  
依存の注入(Iocコンテナに登録したり)や、フィルター、または独自のバリデート、コマンドなど  
自由に定義する事ができます
{/discussion}

{credit}
Author:Yuuki Takezawa
{/credit}
