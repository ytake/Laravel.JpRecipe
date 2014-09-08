---
Title:    実行環境の決定
Topics:   configuration, environment
Position: 4
---

{problem}
開発環境、ステージング環境、本番環境とで異なる設定をしたい
{/problem}

{solution}
実行環境毎の構成を作る事が出来ます

実行環境を検出することで、環境ごとに設定ファイルを用意して動作を変更する事が出来ます

#### Step 1 - boostrap/start.phpの更新

`bootstrap/start.php`で次の行を探して下さい。

```php
$env = $app->detectEnvironment(array(
    'local' => array('homestead'),
));
```

実行しているPCのhostnameが'homestead'の場合に**local**環境を利用します

#### 注意
Laravel 4.1ではhostnameは使用しない、安全性に欠ける方法を利用していた為非難されました  
現在は実行しているPCのhostnameを取得しています(`gethostname()`)

利用しているPCの名前に変更してみましょう  
コマンドラインでは以下のコマンドで取得できます

```bash
$ hostname
```

```php
$env = $app->detectEnvironment(array(
    'local' => array('mymachine'),
));
```

一度に複数のhostname等を指定する事が可能です

```php
$env = $app->detectEnvironment([
    'local' => ['mymachine1', 'mymachine2'],
	  'staging' => ['staging-server'],
]);
```

#### Step 2 - 利用環境に合わせた設定フォルダを作成します

```bash
$ mkdir app/config/local
```

#### Step 3 - 設定を追加します

例えば、`app/config/local/app.php`ファイルに、デバッグと、タイムゾーンの設定を記述します

```bash
<?php
return [
    'debug' => true,
	  'timezone' => 'Asia/Tokyo',
];
```

{/solution}

{discussion}
構成はマージされて実行されます

メインの設定ファイルにマージされて実行されます(`app/config/app.php`)  
上記の例では、下記の様になります

```php
<?php
// keyはapp/config/app.phpから取得します
echo Config::get('app.key');

// タイムゾーンはapp/config/local/app.phpから取得します
// 'Asia/Tokyo'が出力されます
echo Config::get('app.timezone');
```

環境固有の設定値が優先されます

#### 注意
### 'testing'という名称は使用しないで下さい
`testing`はユニットテストで使用されます

{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
