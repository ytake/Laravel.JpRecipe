---
Title:    新しいパッケージのワークベンチを作成したい
Topics:   artisan, packages
Code:     -
Id:       74
Position: 22
---

{problem}
Laravelプロジェクト間で共有できるパッケージを作成したい。
{/problem}

{solution}
`php artisan workbench`コマンドが利用できます。

このコマンドはアプリケーションと同じようにパッケージを開発できるようにします。

{php}
$ php artisan workbench yourname/packagename
{/php}

Laravel特有のリソースを作成する場合は、`--resources`オプションを利用します。

{php}
$ php artisan workbench yourname/packagename --resources
{/php}
{/solution}

{discussion}
Laravelワークベンチはパッケージを動作させるのに最適な方法です。

ワークベンチを使用することでパッケージ開発の迅速なワークフローを提供します。

新しいワークベンチを作成すると、次のような構造が作成されます。

{text}
myapp : プロジェクトディレクトリ
|- workbench : ワークベンチディレクトリ
|---- yourname : ベンダーディレクトリ
|------- packagename : パッケージルート
|---------- src : ソースディレクトリ
|------------- Yourname : ベンダー名
|---------------- Packagename : パッケージ名
|------------------- PackageServiceProvider.php - パッケージの土台
|---------- tests : ユニットテスト用ディレクトリ
|---------- vendor : パッケージのベンダーディレクトリ
{/text}

`--resources`オプションを使用することで、`config`、 `controllers`、 `lang`、 `migrations`、そして`views`が`src`ディレクトリに生成されます。

Laravelのブートストラップが自動的にワークベンチを読み込みます。

パッケージの開発が完了したら、新しいGithubリポジトリへ`workbench`ディレクトリ以下全てを置き、パッケージを他のユーザが利用可能な状態にします。
{/discussion}
