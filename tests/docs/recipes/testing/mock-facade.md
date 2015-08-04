---
Title:    ファサードをモックする
Topics:   testing, phpunit, mockery
Position: 2
---

{problem}
ユニットテストでファサードをモックしたい
{/problem}

{solution}
Laravelは、各コンポーネントを簡単に利用できる様に  
スタティックなインターフェースが提供されています

`App`, `HTML`, `DB`など多くのコンポーネントがファサード(Facade)を介して  
利用できる様になっています

_LaravelのFacadeは、デザインパターンのプロキシパターンを利用しています_

[デザインパターン](http://ja.wikipedia.org/wiki/%E3%83%87%E3%82%B6%E3%82%A4%E3%83%B3%E3%83%91%E3%82%BF%E3%83%BC%E3%83%B3_%28%E3%82%BD%E3%83%95%E3%83%88%E3%82%A6%E3%82%A7%E3%82%A2%29)  
[Proxy パターン](http://ja.wikipedia.org/wiki/Proxy_%E3%83%91%E3%82%BF%E3%83%BC%E3%83%B3)

Laravelのコアなユーザーの方たちは、  
実際に上記の`App`, `HTML`, `DB`などはクラスとして存在していない事は  
ご存知だと思います

これらは全てIoCコンテナで管理され、  
各ファサードのメソッドが実行されると、  
IoCコンテナから該当するインスタンスを取得して実行される様になっています

こういったLaravelのファサードを利用したクラス等をテストする際に、  
モックしなければならないケースが発生しますが、  
Laravelのこれらのファサードを簡単にモックできる様にMockeryが採用されています

### Mockeryインストール
Mockeryを利用する場合は、composer.jsonで指定します

```json
    "require-dev": {
        "phpunit/phpunit": "4.*",
        "mockery/mockery": "0.*"
    },
```

_本番環境等で不要な場合は --no-dev を指定してください_

### ファサード モック

`DB::connection()`をモックする場合は、以下の様になります

```php
\DB::shouldRecive('connection')
```

上記の様に`shouldRecive()`を利用します  
これを利用するとMockeryのモックオブジェクトが取得でき、  
それ以降はメソッドチェインでMockeryのメソッドを利用します

`shouldRecive()`を利用する場合は、必ず`Illuminate\Foundation\Testing\TestCase`または  
デフォルトで提供されている`app/tests/TestCase.php`を継承して  
`setUp()`を実行するようにしてください

またMockeryはスタンドアロンのモックオブジェクトフレームワークとして使用できる様なデザインとなっているので、  
phpunitらと統合するには、tearDown()メソッドを定義します

```php
use Mockery as m;

class AbstractRepositoryTest extends TestCase
{

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
    }

}
```

これでユニットテストを実行する準備が整いました

先ほどの`DB::connection()`をサンプルにすると以下の様になります

```php
// \DB::connection('slave')->table('hoge')->get() をモックします
$builder = m::mock("\Illuminate\Database\Query\Builder");
$builder->shouldReceive('table')->once('hoge')->andReturn($builder);
$builder->shouldReceive('get')->once()->andReturn(m::mock("stdClass"));
\DB::shouldReceive('connection')->with('slave')->once()->andReturn($builder);
```
{/solution}

{discussion}
Mockeryについては、レシピ以上の内容となってしまいますので、  
公式リファレンスや[padraic/mockery](https://github.com/padraic/mockery#documentation)、  
日本語で記述されている[Mockery 0.8.0 日本語ドキュメント](http://kore1server.com/202/Mockery+0.8.0+%E6%97%A5%E6%9C%AC%E8%AA%9E%E3%83%89%E3%82%AD%E3%83%A5%E3%83%A1%E3%83%B3%E3%83%88)  
をご覧ください

お好みでphpunitのモックを利用しても構いません  
[モックオブジェクト](https://phpunit.de/manual/current/ja/test-doubles.html#test-doubles.mock-objects)
{/discussion}

{credit}
Author:Yuuki Takezawa
{/credit}
