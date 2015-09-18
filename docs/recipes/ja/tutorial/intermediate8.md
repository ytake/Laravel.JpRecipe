このチュートリアルではLaravelのFacade(ファサード)について学びます。
Laravelのリファレンスなどを読むとFacadeという文字を良く見ると思います。
このFacadeというものの実態を知ることで、Laravelについてより学ぶことができます。

# Facadeパターン
FacadeはGoFによるソフトウェアデザインパターンの一つです。
https://ja.wikipedia.org/wiki/%E3%83%87%E3%82%B6%E3%82%A4%E3%83%B3%E3%83%91%E3%82%BF%E3%83%BC%E3%83%B3_%28%E3%82%BD%E3%83%95%E3%83%88%E3%82%A6%E3%82%A7%E3%82%A2%29
LaravelのFacadeはデザインパターンのFacadeとは大きく異なります。
どのような点が異なるのでしょうか？

## ポイント
Laravelを初めて使うとき、多くの方が下記のように実装コードを記述しているはずです。

```php
\Input::get('name');
\Cache::put('key', $result, 120);
```

PHPの経験がある方はもちろん、
初めての方は*::*による記述方法の意味を調べるためにPHPのマニュアルを読んだり、検索をします。
そこにはstaticと書かれていることが多いはずです。
[static キーワード](http://php.net/manual/ja/language.oop5.static.php)

多くの方はこの[staticによる記法がFacadeというものなんだ]、と思うでしょう。
または、IDEなどを利用している方はある点に気付くはずです。
LaravelのこのFacadeを記述すると、全く補完が行えません。
それどころかフレームワークのソースコードを読んでも、例えば

```php
class Session
{
    public static function get($key) 
    {
        // something
    }
}
```

といったコードが見つからないはずです。
これはPHPのマジックメソッドと呼ばれる特殊なメソッドを利用しているためです。
静的呼び出し、つまり何らかの仕組みでstaticメソッドの見た目でメソッドをコールすると、
適切な処理が実行されてインスタンスが生成されています。
では実際のFacadeパターンとはどのようなものなのでしょうか？

## Facadeパターンの姿
PHPで書き表すと次のようなコードが代表とされます。

```php
<?php

namespace DesignPatterns\Structural\Facade;

class Facade
{
    /**
     * @var OsInterface
     */
    protected $os;

    /**
     * @var BiosInterface
     */
    protected $bios;

    /**
     * This is the perfect time to use a dependency injection container
     * to create an instance of this class
     *
     * @param BiosInterface $bios
     * @param OsInterface   $os
     */
    public function __construct(BiosInterface $bios, OsInterface $os)
    {
        $this->bios = $bios;
        $this->os = $os;
    }

    /**
     * turn on the system
     */
    public function turnOn()
    {
        $this->bios->execute();
        $this->bios->waitForKeyPress();
        $this->bios->launch($this->os);
    }

    /**
     * turn off the system
     */
    public function turnOff()
    {
        $this->os->halt();
        $this->bios->powerDown();
    }
}

```

このコードにはstaticメソッドはありません。
Facadeパターンと呼ばれるものは[複雑な関連を持つクラス群を簡単に利用するための「窓口」を用意するパターンです]とされます。
上記のFacadeクラスのコードは、2つの抽象に依存していますが、実際に利用されるオブジェクトに対して無知です。
この抽象に依存したオブジェクトそれぞれが関わり合い、Facadeクラス外に対して処理を隠蔽しています。

この例で言えば、BiosInterfaceを実装したクラス、OsInterfaceを実装したクラスが注入されれば、
処理を実行できることを意味しています。

![500px-Facade_UML_class_diagram.svg.png](//owl.style.dev.istyle.local/images/4/3218/80f7c239-55ed-f0cc0-b5a5-d19c5200a275.png)
つまりLaravelの実装コードとは大きく異なりそうです。
ではLaravelのFacadeはどのような仕組みなのでしょうか？

# LaravelのFacade
ルーティングでよく利用する`Route`ファサードを例に読み解いてみましょう。
`Route`の実態は何でしょうか？

## alias
まずphpの仕組みとして、`class_alias`という関数があります。
この関数はあるクラスに別名をつけて、それをコールできるようにするものです。

これは、フレームワークの実行コードの最初の方で実行される
`Illuminate\Foundation\Bootstrap\RegisterFacades`クラスのbootstrapメソッドの内部で、
`Illuminate\Foundation\AliasLoader`クラスが行っています。
ここではconfig/app.phpファイルの`aliasesキー`が利用されています。

```php
'Route'     => Illuminate\Support\Facades\Route::class,
```

どうやら`Illuminate\Support\Facades\Route`クラスが呼ばれているようです。
このクラスのコードを読んでみましょう。

## 静的な呼び出し
このクラスには下記のコードが記述されていますが、
ルーティングで利用するgetやpostといったメソッドはどこにもありません。
getFacadeAccessorメソッドのみとなります。

```php
<?php

namespace Illuminate\Support\Facades;

/**
 * @see \Illuminate\Routing\Router
 */
class Route extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'router';
    }
}

```

このクラスの基底クラス`Illuminate\Support\Facades\Facade`を読んでみましょう。
モック関連のメソッドが記述されていますが、下部に次のコードが記述されています。

```php
    public static function __callStatic($method, $args)
    {
        $instance = static::getFacadeRoot();

        switch (count($args)) {
            case 0:
                return $instance->$method();

            case 1:
                return $instance->$method($args[0]);

            case 2:
                return $instance->$method($args[0], $args[1]);

            case 3:
                return $instance->$method($args[0], $args[1], $args[2]);

            case 4:
                return $instance->$method($args[0], $args[1], $args[2], $args[3]);

            default:
                return call_user_func_array([$instance, $method], $args);
        }
    }

```

これがPHPのマジックメソッドの一つで、
アクセス不能メソッドを静的コンテキストでコールしたときに動作します。
この例ではRouteを静的に呼び出すと、この__callStaticメソッドがコールされ、
`getFacadeRoot`メソッドの内部でgetFacadeAccessorが利用されます。
ここではサービスコンテナにある`router`にアクセスしています。
ここがオブジェクトであればそのインスタンスが返却され、
サービスコンテナから生成されれば、コンテナでインスタンスが保持されます。
この仕組みを利用するとサービスコンテナを利用せずにファサードを利用できるということになります。

## サービスコンテナのrouter
サービスコンテナには次のように登録されています。

```php
$this->app['router'] = $this->app->share(function ($app) {
    return new \Illuminate\Routing\Router($app['events'], $app);
});
```

ここで実クラスがようやく登場します。
つまりこのファサードはstaticメソッドに見せかけて、定義されたサービスを取得しています。
パターンとしてはサービスロケータ、proxyパターンとして動作しています。

簡単な記述方法の裏には、phpのマジックメソッドを用いた実装テクニックが潜んでいます。

記述が同じstaticメソッドとは全く異なり、
インスタンスが生成されて使われているということを理解しておきましょう。

<blockquote class="twitter-tweet" lang="ja"><p lang="en" dir="ltr">Breaking: Laravel facades and the facade pattern are two different things. The establishment wants me to make sure you DEFINITELY know this!</p>— Taylor Otwell (@taylorotwell) <a href="https://twitter.com/taylorotwell/status/441393069531742208">2014, 3月 6</a></blockquote>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

# ファサードを追加する
## コンテナを利用せずに追加
サービスコンテナを使わずにファサードとしてとあるクラスをコールできるように記述してみましょう。
例として次のクラスを用意します。

```php
<?php

namespace App;

/**
 * Class Tutorial
 *
 * @package App
 */
class Tutorial
{
    /** @var string */
    protected $title = 'Laravel5.1チュートリアル';

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}

```

ファサードを利用するために`Illuminate\Support\Facades\Facade`を継承したクラスを用意します。

```php
<?php

namespace App;

use Illuminate\Support\Facades\Facade;

class TutorialFacade extends Facade
{
    /**
     * @return Tutorial
     */
    protected static function getFacadeAccessor()
    {
        return new Tutorial();
    }
}

```

コールされるたびにインスタンスが生成されるようになります。
次にclass_aliasを登録しましょう。
**config/app.php**のaliasesキーに次のコードを追加します。

```php
'Tutorial'  => App\TutorialFacade::class
```

登録はこれだけです。
任意のクラスで次のように実行してみましょう。

```php
var_dump(\Tutorial::getTitle());
\Tutorial::setTitle('hello');
var_dump(\Tutorial::getTitle());
```

実行されていることを確認しましょう。
ここではセッターで文字列を指定していますが、コールされるたびにインスタンスが生成されるため、
初期設定の`Laravel5.1チュートリアル`しか返却されません。

インスタンスをサービスコンテナで保持させるにはサービスプロバイダなどを利用します。

## コンテナを利用して追加
サービスプロバイダのregisterメソッドでサービスを定義します。

```php

    public function register()
    {
        $this->app->bind('tutorial', function () {
            return new \App\Tutorial;
        });
    }
```

App\TutorialFacadeクラスを次のように変更します。

```php
<?php

namespace App;

use Illuminate\Support\Facades\Facade;

class TutorialFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tutorial';
    }
}

```

サービスコンテナのインスタンスを利用するようになり、期待する動作となります。

ファサードとサービスコンテナの関連性をしっかりと理解しましょう。
