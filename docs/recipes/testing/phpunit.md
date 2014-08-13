---
Title:    Laravelプロジェクトでphpunitを利用する
Position: 1
---

{problem}
Laravelプロジェクトでphpunitを使ってテストを書きたい
{/problem}

{solution}
Laravelをインストールすると、デフォルトで`phpunit.xml`が設置されています。  
ここではその内容について触れます。

Laravelはデフォルトの状態でユニットテストを簡単に行う事ができます。  
```
<?xml version="1.0" encoding="UTF-8"?>
<phpunit backupGlobals="false"
    backupStaticAttributes="false"
    bootstrap="bootstrap/autoload.php"
    colors="true"
    convertErrorsToExceptions="true"
    convertNoticesToExceptions="true"
    convertWarningsToExceptions="true"
    processIsolation="false"
    stopOnFailure="false"
    syntaxCheck="false"
>
    <testsuites>
        <testsuite name="Application Test Suite">
            <directory>./app/tests/</directory>
        </testsuite>
    </testsuites>
</phpunit>
```
###phpunitをインストールしよう
phpunitの導入が済んでいない方は、composerで簡単に導入ができます。  
`require-dev`に任意のバージョンのphpunitを記述してください。  
`mockery`はLaravelでテストを書く際に、  
Facadeをストレス無く簡単にモックを作成してくれる便利なライブラリです。  
`mockery`については他のレシピを参考にしてください。  
```js
"require-dev": {
    "phpunit/phpunit": "4.*",
    "mockery/mockery": "0.*"
},
```

```bash
$ composer update
```
などでインストールしましょう。  

###テストの場所？
デフォルトの状態では、`app/tests`配下を対象として実行されます。  
任意のディレクトリに変更する場合は`<directory>./app/tests/</directory>`から忘れずに変更してください。

サンプルで用意されている`app/tests/ExampleTest.php`を実行してみましょう。  

Laravelプロジェクトのディレクトリで、実行します。  
composerでphpunitを導入した場合は、`./vendor/bin/phpunit`を指定して実行します。
```bash
$ ./vendor/bin/phpunit app/tests/ExampleTest.php
```
グリーンになりましたか？
ファイルを指定して実行する場合は上記の様になります。  
全てテストする場合は、  
```bash
$ ./vendor/bin/phpunit
```
としてください。
{/solution}

{discussion}
ここではユニットテストの重要性等については特に記述しませんので、  
書籍等を参考に学習しましょう。  

PHPUnitについては、公式のリファレンス等を参考にしてください。[PHPUnit](http://phpunit.de/)  
もし、Laravelで作ったアプリケーションや、パッケージ等をGitHub等で公開する場合は、  
かならずtestコードも含める様にしましょう！  
それだけで貴方が作り上げたコードは、品質の良いものになり、  
不具合なども簡単に見つける事ができます。
{/discussion}
