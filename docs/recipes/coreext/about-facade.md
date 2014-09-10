---
Title:    ファサードクラス一覧
Topics:   -
Position: 7
---

{problem}
ファサードを介さずにクラスを利用したい  
ファサードと関連付いたクラスがどれかわからない

これらはLaraveの構造を理解する上でも大きなヒントになります
{/problem}

{solution}
これらは公式リファレンスなどにも明記されていますが、  
ファサードと実際のクラスの一覧は次の通りです

[ファサードクラス一覧](http://laravel4.kore1server.com/docs/facades#facade-class-reference)  
[Facade Class Reference](http://laravel.com/docs/facades#facade-class-reference)

実際にファサードを利用しない場合は次の様になります  

```php
<?php
namespace Acme\Controllers;

use Illuminate\Config\Repository as Config;

class HomeController extends BaseController
{

    /** @var Config */
    protected $config;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }
}
```

上記の様にコンストラクタインジェクションを利用するか、  
必要に応じてインスタンスを生成することでファサードを利用しないコーディングが可能です

またこれらはパッケージ開発時にも有用です  
ファサードと実際のクラスの関連を理解する事で、ファサードを利用したテストコードが苦手な方や、  
Laravelコンポーネントを利用しつつも、フレームワークにあまり依存しないパッケージ作りなども可能です

{/solution}

{discussion}
これらはサービスプロバイダーでの実装にも使用する事が出来ます

フィルターやviewコンポーザー等を登録する場合は、  
`global.php`に記述せずに、以下の様にサービスプロバイダーで実装することもできます

```php
<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ApplicationServiceProvider extends ServiceProvider
{

    public function register()
    {
        // view composer
        $this->app->view->composer('index', 'App\Composers\IndexComposer');
        // register filter
        $this->app->router->filter('user.filter', 'App\Filters\UserFilter');
    }
}
```

`$this->app`は `Illuminate\Container\Container`を継承した`Illuminate\Foundation\Application`オブジェクトです  
IoCコンテナを利用してそれぞれのインスタンスにアクセスする事が出来ます

パッケージ作りや、ソースコードのリファクタリングなどに利用してみましょう
{/discussion}

{credit}
Author:Yuuki Takezawa
{/credit}
