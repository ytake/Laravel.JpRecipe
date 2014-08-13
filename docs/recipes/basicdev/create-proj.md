---
Title:    Laravelプロジェクトの作成方法
Topics:   Composer
Code:     -
Id:       30
Position: 1
---

{problem}
Laravelでコーディングする準備が整ったが、  
プロジェクトの作成方法やインストール等がわからない
{/problem}

{solution}
composerを使ってプロジェクトを作成します。

```bash
$ composer create-project laravel/laravel myapp
```
実行したら1、2分だけ完了までお待ち下さい。  
完了後に、`myapp`ディレクトリに、初期状態のプロジェクトが作成されます。
{/solution}

{discussion}
このcomposerコマンドは色々な事をします。  
`create-project`コマンドは、初期状態のLaravelのディレクトリ構造を作成し、  
ライブラリなどを管理する`composer.json`を使用して、  
自動的に依存しているライブラリ等をインストールします。

初期状態で作成されるディレクトリ構造は次の通りです:  

```
myapp : プロジェクトのディレクトリ
|- app : アプリケーションディレクトリ
|---- commands : コンソールコマンド
|---- config : それぞれの設定ファイルが設置されています
|---- controllers : コントローラー
|---- database : データベース関連
|------- migrations : マイグレート関連ファイルの設置場所
|------- seeds : 初期に挿入したいデータ(seed)などのファイルの設置場所
|---- lang : 多言語対応ファイルの設置場所
|---- models : モデルの設置場所
|---- start : アプリケーション　スタートアップ関連
|---- storage : それぞれディスクに保存される機能が使うディレクトリ
|------- cache : ファイルキャッシュを選択されている場合はここに保存されます
|------- logs : ログファイルが保存されます
|------- meta : meta情報が保存されます
|------- session : ファイルセッションを選択されている場合はここに保存されます
|------- views : Bladeテンプレートが利用します
|---- tests : ユニットテスト
|---- views : Bladeテンプレートの設置場所
|- bootstrap : フレームワークのbootstrap関連のファイル置き場
|- public : ドキュメントルート
|- vendor : composerがインストールした依存関係のライブラリはこちらです
```
{/discussion}
