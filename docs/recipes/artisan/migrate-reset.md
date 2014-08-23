---
Title:    データベースマイグレーションをロールバックしたい
Topics:   artisan, migrations
Code:     -
Id:       67
Position: 15
---

{problem}
全てのデータベースマイグレーションを元に戻したい。

テーブルが何もないクリーンなデータベースにしたい。
{/problem}

{solution}
`php artisan migrate:reset`コマンドがが利用できます。

```bash
$ php artisan migrate:reset
```

データに影響を与えていないか見るためには`--pretend`オプションが利用できます。

```bash
$ php artsian migrate:reset --pretend
```
{/solution}

{discussion}
このコマンドは`migrate:rollback`を何度も呼び出しているようなものです。

実際、`php artisan migrate:rollback`を何度も呼び出すこともできますが、rollbackの本来の使い方ではありません。

このコマンドの実行完了後、データベースに残っているのは中身が空の`migrations`テーブルのみになります。
{/discussion}
