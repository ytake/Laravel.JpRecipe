---
Title:    期限切れパスワードのリマインダーをクリアする
Topics:   artisan, authentication, password reminders
Code:     -
Id:       72
Position: 20
---

{problem}
パスワードリマインダーテーブルが巨大になってきている。

多くのレコードがテーブルに存在します。
{/problem}

{solution}
`php artisan auth:clear-reminders`コマンドが利用できます。

This will clear out any expired tokens from the `password_reminders` table.
このコマンドは`password_reminders`テーブルから全ての期限切れトークンを削除します。

{php}
$ php artisan auth:clear-reminders
{/php}
{/solution}

{discussion}
定期的にコマンドを実行してください。

１日１回、もしくは１週間に１回はcronのジョブでコマンドを実行することになるでしょう。
{/discussion}
