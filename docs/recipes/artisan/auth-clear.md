---
Title:    期限切れパスワードのリマインダーをクリアする
Topics:   artisan, authentication, password reminders
Position: 20
---

{problem}
パスワードリマインダーテーブルに多くのレコードがあるため巨大になってきている
{/problem}

{solution}
`php artisan auth:clear-reminders`コマンドが利用できます

このコマンドは`password_reminders`テーブルから期限切れトークンを全て削除します

```bash
$ php artisan auth:clear-reminders
```
{/solution}

{discussion}
定期的にコマンドを実行してください

１日１回、もしくは１週間に１回はcronのジョブでコマンドを実行することになるでしょう
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27  
[Twitter](https://twitter.com/syossan27)  
[web](http://syossan.hateblo.jp/0)
{/credit}
