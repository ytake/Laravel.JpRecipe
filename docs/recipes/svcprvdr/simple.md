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

そしてそこに機能を追加します

まず、サービスプロバイダーを実装する為のファイルを作成します  
コーディング規約にPSRを利用している場合は、`app/MyApp/Providers`の様に作成するか、  
または規約に沿っている形であればどこに置いても構いません

PSR以外の規約や、`classmap`等を利用されている場合は、  
既存のフォルダ内に作成するか、任意のディレクトリを作成してcomposer.json等に追記してください

```json
"autoload": {
    "classmap": [
        "app/database/migrations",
        "app/database/seeds",
        "app/tests/TestCase.php",
        "作成したディレクトリ"
	]
},
```

この場合、

```bash
$ composer dump-autoload
```

を必ず実行しましょう  
PSR利用の場合は`dump-autoload`は不要です。

```php
<?php
namespace MyApp\Providers;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

```
次に、`app/config/app.php`の`providers[]`配列に今作成したクラスを追加します

```php
    'providers' => [
        'MyApp\Providers\TestServiceProvider',
    ],
```

これだけです！これでサービスプロバイダーが有効になります
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
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
