---
Title:    インターフェイスと実装の関連付け
Topics:   IoC container
Code:     App::bind(), App::make()
Id:       33
Position: 4
---

{problem}
PHPはインターフェイスをインスタンス化することはできません　　

ソリッド設計原則に従う、綺麗なコードを書くのが好き、  
またはテストしやすい設計にしたい場合、  
どうやってインターフェイスとクラスを自動的に関連付ければ良いのでしょうか？
{/problem}

{solution}
`App::bind()`を使います

```php
// FooInterfaceをFooClassと関連付ける
\App::bind('FooInterface', 'FooClass');

// FooInterfaceを無名関数と関連付ける事もできます
\App::bind('FooInterface', function($app) {
	return new FooClass;
});
```
上記の様に記述すると、いつでもどこでも`App::make('FooInterface')`で  
FooClassをインスタンス化する事ができます。
{/solution}

{discussion}
インターフェイスはプログラミングをより強力なものにしてくれます。  

インターフェイスを直接指定する事で実装を切り離し、  
別のところで具体的な実装を関連付ける事で、  
それぞれの実装を簡単に入れ替える事ができ、  
より強力な、拡張性の高いアプリケーションになります

[[Where to Keep Your Application Bindings]]　もご覧下さい
{/discussion}
