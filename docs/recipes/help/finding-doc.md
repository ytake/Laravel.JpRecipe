---
Title:    Laravelに関連するドキュメント
Topics:   Carbon, Composer, documentation, help, Laravel API, Monolog, Swift
          Mailer, Symfony
Code:     -
Id:       13
Position: 1
---

{problem}
Laravelのクラスやメソッドの使い方がわからない

Laravelは、Illuminateコンポーネントの他、  
車輪の再発明を避けて、広く一般的に利用されているコンポーネントも多く利用しています。  
{/problem}

{solution}
まずは、Laravelの公式ドキュメントをご覧下さい。  
[Laravel.com](http://laravel.com/docs)　　
[Laravel日本語ドキュメント](http://laravel4.kore1server.com/)  
他にAPIドキュメントも参考にしてみましょう  
[Laravel API](http://laravel.com/api)
{/solution}

{discussion}
Laravelが利用しているコンポーネントについて調べる場合は、  
下記のライブラリを参照してください

* [Monolog](https://github.com/seldaek/monolog) - `Log`ファサードで利用されています
* [Carbon](https://github.com/briannesbitt/Carbon) - Date関連などで大変便利な`Carbon`が利用されています
* [Swift Mailer](http://swiftmailer.org/docs/introduction.html) - `Mail`ファサードで利用されている、シンプル且つ強力なメールライブラリです
* [Symfony](http://symfony.com/doc/current/index.html) - LaravelのコアはSymfony componentを利用して構成されています
{/discussion}
