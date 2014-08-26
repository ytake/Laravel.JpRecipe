---
Title:    デフォルトのリクエストクラスを変更する
Topics:   -
Code:     App::requestClass()
Id:       210
Position: 4
---

{problem}
アプリケーション独自のリクエストクラスを使いたい
{/problem}

{solution}
ライフサイクルの早期段階で`Application::requestClass()`を利用します

Laravelアプリケーションが起動する際に`Application`クラスが生成され、
`Application`クラスが最初にリクエストクラスのインスタンスを生成するので、
生成される前に変更しなければなりません

#### Step 1 - クラスを作成する

必ず`\Illuminate\Http\Request`クラスを継承しなければなりません

```php
<?php
namespace MyApp;

class Request extends \Illuminate\Http\Request
{
    // add your methods here
}
```

#### Step 2 - `bootstrap/start.php`を変更します

`$app = new Illuminate\Foundation\Application;`よりも上部で次のコードを追加します

```php
use Illuminate\Foundation\Application;

Application::requestClass('MyApp\Request');
```

これだけです！
`Application`が構築されるときに、`Illuminate\Http\Request`に変わって独自のクラスが利用されます
{/solution}

{discussion}
`Application::requestClass()`にクラスを指定しない場合は、リクエストクラスを設定せずに
利用されるリクエストクラス名を返却します

[[デフォルトのRequestクラスを取得する]] をご覧下さい

リクエストライフサイクルの初期で設定されるため、
この段階では`App`ファサードを利用する事はできません
{/discussion}
