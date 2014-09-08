---
Title:    PSR-0準拠のディレクトリ構造
Topics:   configuration, psr-0
Position: 9
---

{problem}
`app/models` と `app/controllers`にたくさんの実装コードがあります

開発が進むにつれて、Laravelがデフォルトで提供しているディレクトリ内に多くのファイルが出来上がり、  
肥大化していきます
{/problem}

{solution}
PSR-0に準拠したディレクトリ構造を利用してみましょう

最初に`composer.json` を編集して更新しましょう

```json
{
    "autoload": {
        "psr-0": {
            "MyApp": "app/"
        },
        "classmap": [
            "app/commands",
            "app/database/migrations"
            "app/database/seeds",
            "app/tests/TestCase.php"
        ]
    }
}
```

ここでは、`"classmap"` から使用していないディレクトリを全て削除して、  
`"psr-0"`を利用するディレクトリを追加します

autoloadファイルを再生成します

```bash
$ composer dump-autoload
```

名前空間を使用して、クラスの階層を構築することができます
{/solution}

{discussion}
準拠したサンプルのクラスです

"app/"配下の `app/MyApp/Controllers` にコントローラーがあるとしましょう  
そのコントローラーが`MiscController.php`というファイル名になっています

```php
<?php
namespace MyApp\Controllers;

class MiscController extends \Controller
{
    // 実装コード
}

```

PSR-0を利用する事で、  
"どこにコードを実装したら良いですか？"から"どうやって構造化するべきですか？"と考え方に変化をもたらします
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
