---
Title:    メッセージローダーにnamespaceを追加する
Topics:   localization
Code:     Lang::addNamespace()
Id:       258
Position: 7
---

{problem}
translatorにnamespaceを利用した多言語メッセージファイル等を追加したい
{/problem}

{solution}
`Lang::addNamespace()`メソッドを利用します

```php
$namespace = 'custom';
$path = app_path().'/storage/custom-messages';
\Lang::addNamespace($namespace, $path);
```

`app/storage/custom-messages/en`ディレクトリに`error.php`ファイルがある場合に、
`'test'`キーを利用する場合は次のようになります

```php
echo \Lang::get('custom::error.test');
```
{/solution}

{discussion}
この方法で、パッケージで独自の言語ファイルを持つ事ができます

ほとんどの場合、パッケージにはサービスプロバイダがありますが、  
内部で`package()`メソッドを利用して、  
パッケージの名前空間を含んだ言語ファイルを一箇所で登録する事ができます。

ローレベルで、直接このメソッドを利用する場合は、次の様にします。  
`$this->app['translator']->addNamespace(...)`
{/discussion}
