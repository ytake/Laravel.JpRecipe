---
Title:    マイグレーションリポジトリを作成したい
Topics:   artisan, migrations
Code:     -
Id:       63
Position: 11
---

{problem}
マイグレーションリポジトリを作成したい。

マイグレーションリポジトリが全てのデータベースマイグレーションをリストとして持っていることは知っていると思います。
いくつかのマイグレーションは作成準備ができていると思いますので、マイグレーションリポジトリの作成をしてみます。
{/problem}

{solution}
`php artisan migrate:install`コマンドが利用できます。

{php}
$ php artisan migrate:install
{/php}
{/solution}

{discussion}
このコマンドは必ずしも必要というわけではありません。

Laravelは自動的に必要なマイグレーションリポジトリを作成します。
ただ、もしデータベースが正しく設定されているかのテストを作成したい場合はこのコマンドを使うことになるでしょう。
{/discussion}
