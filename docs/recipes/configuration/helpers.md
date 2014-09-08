---
Title:    ヘルパーファイルの作成
Topics:   configuration
Position: 10
---

{problem}
色々な処理で利用できる機能をまとめたファイル等を設置したいが、  
`app\start\global.php`に追記してソースを汚したくない
{/problem}

{solution}
`helpers.php`としてファイルを作成してみましょう  
ファイル名はなんでも構いませんが、ここでは`helpers.php`としています

まず`app/helpers.php`を作成します

```php
<?php
// common functions
function somethingOrOther()
{
    return (mt_rand(1,2) == 1) ? 'something' : 'other';
}

```

次に`app\start\global.php` のどこかに`require`を記述します

```php
// どこかに
require app_path().'/helpers.php';
```

または `composer.json` に下記の様に追記して、`composer dump-autoload`を実行します

````json
{
	"autoload": {
		"files": [
			"app/helpers.php"
		]
	}
}
```

```bash
$ composer dump-auto
```
{/solution}

{discussion}
用途や種類別に複数のヘルパーファイルを作成しても構いません

Laravelは`app/filters.php`, `app/routes.php`を標準で持っています  
ニーズに合わせて柔軟に対応できます

下記の様に持たせる事が可能です

* `app/helpers.php` - 汎用的な関数郡
* `app/composers.php` - view composerに関連するもの
* `app/listeners.php` - イベントリスナー
* `app/observers.php` - 必要であれば **observers** として作成しても良いかもしれません

実装や、構成は開発者次第で自由に作る事が出来ます

#### ファイルをあまり増やしたくない？
ヘルパーとして作成しましたが、  
上記のファイル等はサービスプロバイダーに設置する事も出来ます

{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
