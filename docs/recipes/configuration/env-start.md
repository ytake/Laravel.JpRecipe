---
Title:    スタートファイルを利用した実行環境の決定
Topics:   artisan, configuration, environment
Position: 6
---

{problem}
特定の環境で実行する必要があるスタートコードがある場合

環境毎の設定方法を理解していますが特別なコードを実行する必要があります
{/problem}

{solution}
環境固有のスタートファイルを作成します

仮に、現在の環境が`foo`と指定されているとしましょう  
その場合は`app/start/foo.php`として作成します

```php
<?php
die("I'm in app/start/foo.php");
```

`foo`環境の場合、リクエストの度に"I'm in app/start/foo.php"が表示されて終了します

最初にLaravelは`app/start/global.php`をロードします  
その後、利用環境が`foo`であれば、`app/start/foo.php`の存在を確認し、  
ファイルが見つかればそのファイルが実行されます
{/solution}

{discussion}
他のスタートファイルについて

Laravelでは`app/start/local.php`に空のファイルを設置してあるのをご存知でしょうか？

artisanの実行時に`app/start/artisan.php`ファイルがロードされます  
一般的には、実装したartisanコマンドなどの登録に利用されます

ユニットテスト時にロードしたい場合は、`app/start/testing.php`を作成するだけです

#### これらのファイルはいつロードされますか？

リクエストのライフサイクル内で、フレームワークの起動後にロードされます
[[リクエストのライフサイクルについて理解する]] 起動手順の **Calls booted callbacks** をご覧ください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
