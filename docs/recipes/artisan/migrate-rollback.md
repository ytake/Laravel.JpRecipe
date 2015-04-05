---
Title:    データベースマイグレーションをロールバックしたい
Topics:   artisan, migrations
Position: 14
---

{problem}
データベースマイグレーションの最後の状態に戻したい
{/problem}

{solution}
`php artisan migrate:rollback`コマンドが利用できます

```bash
$ php artisan migrate:rollback
```

このコマンドはマイグレーションを戻し、一覧を表示します

ロールバックが何をしているか見るには、`--pretend`オプションを利用します

```bash
$ php artisan migrate:rollback --pretend
```

デフォルト以外のデータベース接続を指定することも出来ます

```bash
$ php artisan migrate:rollback --pretend --database=other-one
```
{/solution}

{discussion}
このコマンドは最後の状態のマイグレーションの設定に戻します

以前`php artisan migrate`を動かし、  
３つの異なるマイグレーションを行った場合、  
`php artisan migrate:rollback`を実行するとこの３つのマイグレーションが戻ります

これはデータベースの変更の増加を少なくしようと促しています
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27  
[Twitter](https://twitter.com/syossan27)  
[web](http://syossan.hateblo.jp)
{/credit}
