---
Title:    データベースマイグレーションをリセットしたい
Topics:   artisan, migrations
Position: 15
---

{problem}
テーブルを何もないクリーンな元に戻したい
{/problem}

{solution}
`php artisan migrate:reset`コマンドがが利用できます

```bash
$ php artisan migrate:reset
```

データに影響を与えていないか見るためには`--pretend`オプションが利用できます

```bash
$ php artsian migrate:reset --pretend
```
{/solution}

{discussion}
このコマンドは`migrate:rollback`を何度も呼び出しているようなものです

実際、`php artisan migrate:rollback`を何度も呼び出すこともできますが、  
rollbackの本来の使い方ではありません

このコマンドの実行完了後、  
データベースに残っているのは中身が空の`migrations`テーブルのみになります
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27  
[Twitter](https://twitter.com/syossan27)  
[web](http://syossan.hateblo.jp/0)
{/credit}
