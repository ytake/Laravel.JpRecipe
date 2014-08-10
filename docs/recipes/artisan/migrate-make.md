---
Title:    新しいマイグレーションを作成したい
Topics:   artisan, migrations
Code:     -
Id:       64
Position: 12
---

{problem}
新しいデータベースマイグレーションを作成したい。

マイグレーションがデータベースのバージョン管理の一つであると分かっており、これらを使用する準備ができているとします。
{/problem}

{solution}
`php artisan migrate:make`コマンドが利用できます。

このコマンドは`app/database/migrations`ディレクトリにマイグレーションテンプレートを土台として作成します。
After issuing the command you can edit the newly created file and add any needed specifics. _(Such as additional fields, indexes, etc.)_
コマンド実行後、生成されたファイルに必要となる詳細を追記していきます。_(追加フィールド、インデックスなど)_

`--create`オプションを使うことによって、新しいテーブルを作成できます。

{php}
$ php artisan migrate:make --create=users create_users_table
{/php}

既に存在するテーブルを更新する場合は、`--table`オプションを使います。

{php}
$ php artisan migrate:make --table=users add_name_to_users
{/php}

マイグレーションが`app/database/migrations`以外の場所にある場合は、`--path`オプションでコマンドが実行できます。
{/solution}

{discussion}
マイグレーションはパワフルです。

マイグレーションを使用することでデータベースの変更履歴を見ることができます。
{/discussion}
