---
Title:    アプリケーションのBootstrapファイルを取得する
Topics:   -
Code:     App::getBootstrapFile()
Id:       198
Position: 16
---

{problem}
アプリケーションのbootstrapファイルを取得したい
{/problem}

{solution}
`App::getBootstrapFile()`を利用します

このメソッドは、bootstrapファイルへのフルパスを返却します。
```php
echo \App::getBootstrapFile();
```

次のように出力されます  
```text
/apps/example/vendor/laravel/framework/src/Illuminate/Foundation/start.php
```
{/solution}

{discussion}
これはローレベルのメソッドです。

このbootstrapが読み込まれるタイミングは [[リクエストのライフサイクルについて理解する]] に記載されています。  
**The Booting Steps**にある図の"Starts Application"の後の"laravel/start.php"で読み込まれます。
{/discussion}
