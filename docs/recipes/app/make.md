---
Title:    IoCコンテナでオブジェクトを生成する
Topics:   IoC container
Code:     app(), App::bind(), App::instance(), App::make(), App::singleton()
Id:       44
Position: 5
---

{problem}
取得したい何かがIoCコンテナに格納されている

インターフェースがバインドされているオブジェクトや、何かのクラス、  
または配列などの何かのデータなどはIoCコンテナを通じて取得すると、  
テストのしやすさや、拡張性が高くなるということを覚えておきましょう
{/problem}

{solution}
`App::make()`を利用すると簡単に生成したり取得ができます

これは`App::bind()`と共に使用するとよりLaravelらしくなります

```php
// どこかにMyCoolClassを、'myclass'という名前で生成する様に記述します
\App::bind('myclass', function($app) {
    return new MyCoolClass();
});

// 生成したい場所でmyclassが生成されます
$myclass = \App::make('myclass');
```

`App::instance()`とあわせて利用することもできます

```php
// どこかに $mydata変数を 'mydata'として格納します。
\App::instance('mydata', $mydata);

// 先ほどのインスタンス生成と同様に利用しましょう
$mydata = \App::make('mydata');
```

シングルトンを利用したい時も同様に使用できます
```php
// どこかに'stdClass'をシングルトンとして格納しておきます
\App::singleton('mysingleton', 'stdClass');

// 生成したいところで記述しましょう
$var = \App::make('mysingleton');
$var->test = '123';

// さらに利用します
$var2 = \App::make('mysingleton');
echo $var2->test;
```
{/solution}

{discussion}
`App::make()`を利用した様々な解決方法はとても簡単で、強力です  

依存解決の方法としてコンストラクタでタイプヒントで指定すると、  
自動で依存を解決してくれます  

```php
class Foo
{
    // Fooクラス  
}

class Bar
{

    protected $foo;

    // Barクラスのコンストラクタに、Fooクラスを$foo変数で利用する、と指定します
    public function __construct(\Foo $foo)
    {
        $this->foo = $foo;
    }
}

// makeでBarを生成すると、Barのコンストラクタで指定されたFooが自動で解決されます。
$bar = \App::make('Bar');

// このように記述する必要がなく、IoCコンテナが自動的に解決してくれます
$bar = new \Bar(new \Foo);
```

インターフェースもIoCコンテナが自動的に解決します

```php
\App::bind('SomeInterface', 'SomeClassImplementingSomeInterface');
// SomeClassImplementingSomeInterfaceが取得できます
$var = \App::make('SomeInterface');

// コンストラクタでinterfaceを指定してみましょう
class Bar
{

    protected $some;

    //
    public function __construct(\SomeInterface $some)
    {
        $this->some = $some;
    }
}

// こちらも同様です
$bar = \App::make('Bar');

```

ヘルパー関数で用意されている`app()`は`App::make()`のエイリアスです

```php
$obj = app('stdClass');
```
{/discussion}
