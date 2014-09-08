---
Title:    アプリケーションのバインディングの保存場所
Topics:   configuration, IoC container
Code:     -
Id:       51
Position: 11
---

{problem}
使い勝手の良い所にアプリケーションのバインディングを保持させたい

IoCコンテナに複数のバインディングを結びつけ、統合させるのに最適な場所がわからない
{/problem}

{solution}
シンプルに利用する場合は、ヘルパースタイルでファイルを作成する事が出来ますが、  
サービスプロバイダーに記述する事を強くお勧めします。

バインディングを分散させて記述したい場合は、  
[[ヘルパーファイルの作成]]の手順に従って`app/bindings.php`ファイルを作成します

次の様に作成してみましょう

```php
<?php
// インターフェースのバインド
\App::bind('FooInterface', 'FooClass');
\App::bind('BarInterface', 'BarClass');

// クロージャを用いたバインド
\App::bind('FooBar', function()
{
    return new \MyApp\Junk\SimpleFooBar();
});

// シングルトン
\App::singleton('MedicalDictionary', function()
{
		return new \Dictionary('english-medical-terms');
});
```
{/solution}

{discussion}
サービスプロバイダーを忘れないで下さい

サービスプロバイダーは、これらのIoCコンテナのバインディングなどを設置するのに、最も適した場所です。  
特にパッケージ開発などではサービスプロバイダーを必ず利用して下さい

`app/bindings.php`を利用する場合は、サービスプロバイダーなどにコメントを残しましょう。  
その後サービスプロバイダーに統合する事をお勧めします

ヘルパースタイルのファイルの場合は、アプリケーションが起動するまでロードされません  
[[リクエストのライフサイクルについて理解する]]  
もし、独自のサービスプロバイダーで必要なバインディングがある場合は、  
統合する為に、サービスプロバイダーに記述して下さい
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
