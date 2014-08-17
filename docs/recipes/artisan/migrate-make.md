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

コマンド実行後、生成されたファイルに必要となる詳細を追記していきます。_(追加フィールド、インデックスなど)_

`--create`オプションを使うことによって、新しいテーブルを作成できます。

```bash
$ php artisan migrate:make --create=users create_users_table
```

既に存在するテーブルを更新する場合は、`--table`オプションを使います。

```bash
$ php artisan migrate:make --table=users add_name_to_users
```

マイグレーションが`app/database/migrations`以外の場所にある場合は、`--path`オプションでコマンドが実行できます。
{/solution}

{discussion}
マイグレーションはパワフルです。

マイグレーションを使用することでデータベースの変更履歴を見ることができます。
{/discussion}
