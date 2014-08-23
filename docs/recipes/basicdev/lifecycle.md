---
Title:    リクエストのライフサイクルについて理解する
Topics:   -
Code:     -
Id:       52
Position: 4
---

{problem}
どこに実装すれば良いのかわからない

Laravelを使ってプロジェクトをスタートする事にしたが、  
Laravelがどのような構造で、どこで何が行われているか理解を深めてみましょう
{/problem}

{solution}
リクエストのライフサイクルについて学んでみましょう

リクエストのライフサイクルを学ぶ事によって、  
どこで何が行われているかを把握して、実装だけに集中できる様になります。

![Standard Lifecycle](/images/lifecycle.jpg)

もっとも標準的なリクエストのライフサイクルは・・・:

* HTTP リクエストは _ルーター_ から _コントローラー_ へ
* _コントローラー_ は特定の処理を実行して _View_ にデータが送られます
* _View_ は、HTTPレスポンス返却し、レンダリングを行います

上記の流れには、例外と分散等がありますが、  
デフォルトでは三つの機能を利用します。

1. `app/routes.php`でルーティング
2. `app/controllers/` コントローラーを実装 (PSRの規約に準拠する場合は、`app/Project/Controllers/`などになります).
3. `app/views/` View

**あくまでデフォルトの場合であり、Laravelは好みによって自由にディレクトリ構造を変更できま、Laravel自体は構造には依存しない作りになっています**

いくつかの例外は下記の通りです:

* コントローラーを使用せずに、ルーターで直接レスポンスやビューを返却
* それぞれのルーターの実行前後のタイミングで処理が発生する場合 (`app/filters.php`)
* エラーやExceptionなどの例外処理
* イベントによる応答
{/solution}

{discussion}
ライフサイクルを理解してコーディングするためにいくつか紹介します

まず、リクエストのライフサイクルは大きく3つに分ける事が出来ます:  

* ロード
* 起動
* 実行

上記の3つです

#### ローディング 手順

![Loading Steps](/images/bootstrap1.jpg)

ライフサイクルのローディングに影響を与える部分は3つあります

##### (1) Workbench

Workbenches はアプリケーションに沿ったパッケージ開発を可能にします  
[[新しいパッケージのワークベンチを作成したい]]

##### (2) Environment Detections

`bootstrap/start.php`を変更して、アプリケーションの実行環境を切り分ける事が出来ます

[[実行環境の決定]]  
[[クロージャを利用した実行環境の決定]]

##### (3) Paths

`bootstrap/paths.php`を編集して、独自のディレクトリ構造にする事が出来ます
[[storageディレクトリの変更]].

#### 起動手順

![Booting Steps](/images/bootstrap2.jpg)

ライフサイクルのローディングに影響を与える部分は10の領域があります

##### (1) Configuration

アプリケーションの設定は、ブートプロセスとLaravelの実行の両方に影響します。

##### (2) Service Providers

アプリケーションに登録したり、実装したサービスプロバイダは、ブートプロセスの初期にロードされます。  
`protected $defer`をデフォルトのまま利用する場合は、  
それぞれのサービスプロバイダー`register()`がこの時点でコールされます  
[[シンプルなサービスプロバイダーを作成する]]

##### (3) Registering the start files

3つのアプリケーション起動ファイル(#8, #9, #10)の登録されている内容がロードされ、  
"booted"イベントが発動します  

##### (4) Handle middleware going down

上のミドルウェアから下のミドルウェアまで、順次リクエストを処理していきます  
[[ミドルウェアについて理解する]].

##### (5) Booting service providers

サービスプロバイダの`boot()`メソッドがコールされます

##### (6) Booting callbacks

`App::booting()`メソッドで登録されたコールバック処理がコールされます  
[[Booting、Booted Callbacksを登録する]]

##### (7) Booted callbacks.

アプリケーションが起動した状態になり、  
`App::booted()`で登録されているコールバックがコールされます。(#3)  
[[Booting、Booted Callbacksを登録する]]

##### (8) Your application start script is called.

これは、`app/start/globals.php`ファイルです  
このファイルには、すべてのリクエストが処理される前に、常に実行される初期化処理が含まれています。  
Laravelはロギング、例外トラップ、およびメンテナンスモード処理のための適切な値を提供します。  
このファイル以外にも`app/filters.php`で必要な処理を分散させて記述する事も出来ます

##### (9) app/start/{environment}.php

特定の環境でのみ実行するコード等が必要な場合は、任意で配置することができます。  
[[スタートファイルを利用した実行環境の決定]]

##### (10) app/routes.php

アプリケーションのルーター  
アプリケーションを設定する中で、最も一般的なファイルです  

#### 実行手順

![Running Steps](/images/bootstrap3.jpg)

ライフサイクルの実行に影響を与える部分は10の領域があります

##### (1) Maintenance Mode

メンテンスモードリスナーが登録されている場合、アプリケーションがメンテナンスモードの場合にリスナーが実行されるます  
[[メンテナンスモードのハンドラを登録する]].

##### (2) App "before" filters

`App::before()`で登録されているフィルター処理があればコールされます
[[Afterフィルターをコントローラーで登録する]]

##### (3) Route/Controller "before" filters

ルーター、またはコントローラレベルで"before" filtersがある場合は、それらが呼び出されます。

##### (4) The action

ここではコントローラメソッド、またはルーターのコールバックがリクエストを処理するために呼び出されます。

##### (5) Route/Controller "after" filters

ルーター、またはコントローラレベルで"after" filtersがある場合は、それらが呼び出されます。
[[Beforeフィルターをコントローラーで登録する]]

##### (6) App "after" filters.

`App::after()`で登録されているフィルター処理があればコールされます
[[フィルター"After"を実装する]].

##### (7) Middleware response handling

ミドルウェアは、処理後に通常のレスポンスを返却する前に、  
自由に返却するレスポンスを変更することが自由である。

##### (8) Middleware shutdown

`TerminableInterface`を実装した独自のミドルウェアがある場合は、  
その`shutdown()`メソッドがコールされます

##### (9) Finish callbacks

`App::finish()`で登録されたコールバックがあれば、登録されたものがコールされます

##### (10) Shutdown callbacks

最後に`App::shutdown()`で登録されたコールバックがあれば、登録されたものがコールされます  

{/discussion}
