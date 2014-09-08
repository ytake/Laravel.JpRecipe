---
Title:    パフォーマンス改善するためにフレームワークを最適化したい
Topics:   artisan
Position: 8
---

{problem}
アプリケーションを可能な限り高速化したい
{/problem}

{solution}
`php artisan optimize`コマンドが利用できます

```bash
$ php artisan optimize
```

このコマンドは最適化されたクラスローダを生成します

`Config::get('app.debug')`がtrueでテストしている場合、  
`--force`オプションを利用することで強制的にクラスローダを生成します

```bash
$ php artisan optimize --force
```
{/solution}

{discussion}
追加した独自クラスをプリロードしたい

アプリケーションで頻繁に使用されるクラスがある場合、  
独自クラスを最適化プロセスに追加することができます

`app/config/compiled.php`に独自クラスのファイル名を追記します

```php
<?php
return [
    'app\MyApp\Respostitory\PeopleInterface.php',
    'app\MyApp\Reposititory\DatabasePeople.php',
    'app\MyApp\Controllers\HomeController.php',
];
```

最適化は`bootstrap/compiled.php`ファイルを、コメントを削除した全てのクラスを含んで生成します

#### 独自クラスを追加するときの注意

名前空間を使用している場合、必ず全てのクラスに使用しているか確認して下さい  
使用していないとエラーの可能性があります

例えば、最適化のためコンパイルされたリストにコントロールクラスを置いているとしましょう

```php
<?php
namespace MyApp\Controllers;

class HomeController extends \Controller
{
    ...
}
```

このファイルではエラーが発生します  
最適化された単一のファイルに複数の名前空間があるためです  
`use Controller;`を追加することで問題はなくなるでしょう

```php
<?php
namespace MyApp\Controllers;

use Controller;

class HomeController extends Controller
{
    //...
}
```

この違いに注意して下さい。
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27  
[Twitter](https://twitter.com/syossan27)  
[web](http://syossan.hateblo.jp/0)
{/credit}
