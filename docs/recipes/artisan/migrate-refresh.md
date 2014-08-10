---
Title:    全てのマイグレーションを再実行・リセットしたい
Topics:   artisan, migrations
Code:     -
Id:       68
Position: 16
---

{problem}
マイグレーションを再実行・リセットしたい。

手動でデータベースにいくつかの変更を加えてしまったので、最新の状態にデータベースを戻したい。
{/problem}

{solution}
`php artisan migrate:refresh`コマンドが利用できます。

{php}
$ php artisan migrate:refresh
{/php}

最新の状態に戻した後、データベースに再度シーディングをかけるには`--seed`オプションが利用できます。

{php}
$ php artisan migrate:refresh --seed
{/php}
{/solution}

{discussion}
このコマンドはいくつかのステップに分かれています。

内容としては・・・

{php}
$ php artisan migrate:reset
$ php artisan migrate
{/php}

このコマンド一つで上記のコマンドを兼ね備えています。

{tip}
**備考** 
マイグレーションをクリアする時や、マイグレーション再び実行する時にはマイグレーションの設定に基づき作成されます。
`migrate:rollback`実行後には設定に基づき全てのマイグレーションがロールバックされるでしょう。
{/tip}
{/discussion}
