---
Title:    全てのマイグレーションを再実行・リセットしたい
Topics:   artisan, migrations
Position: 16
---

{problem}
手動でデータベースにいくつかの変更を加えてしまったので、  
マイグレーションを再実行またはリセットで最新の状態にデータベースを戻したい
{/problem}

{solution}
`php artisan migrate:refresh`コマンドが利用できます

```bash
$ php artisan migrate:refresh
```

最新の状態に戻した後、  
データベースに再度シーディングをかけるには`--seed`オプションが利用できます

```bash
$ php artisan migrate:refresh --seed
```
{/solution}

{discussion}
このコマンドはいくつかのステップに分かれています

内容としては・・・

```bash
$ php artisan migrate:reset
$ php artisan migrate
```

このコマンド一つで上記のコマンドを兼ね備えています

**備考**
マイグレーションをクリアする時や、マイグレーション再び実行する時にはマイグレーションの設定に基づき作成されます  
`migrate:rollback`実行後には設定に基づき全てのマイグレーションがロールバックされるでしょう
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27  
[Twitter](https://twitter.com/syossan27)  
[web](http://syossan.hateblo.jp/0)
{/credit}
