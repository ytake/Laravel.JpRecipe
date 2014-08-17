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

このコマンドは`password_reminders`テーブルから期限切れトークンを全て削除します。

```bash
$ php artisan auth:clear-reminders
```
{/solution}

{discussion}
定期的にコマンドを実行してください。

１日１回、もしくは１週間に１回はcronのジョブでコマンドを実行することになるでしょう。
{/discussion}
