---
Title:    データベースでのシーディング
Topics:   artisan
Position: 17
---

{problem}
データベースのシードは既に記述していて、Laravelでそのシードを使用したい
{/problem}

{solution}
`php artisan db:seed`コマンドが利用できます

```bash
$ php artisan db:seed
```

ルートシーダとは違ったクラスを使用している場合、  
`--class`オプションが使用できます

```bash
$ php artisan db:seed --class=MyDatabaseSeeder
```
{/solution}

{discussion}
シーディングは通常テスト用に使われます

開発マシン上で標準なレコードを生成しておく場合には良い方法です
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27  
[Twitter](https://twitter.com/syossan27)  
[web](http://syossan.hateblo.jp/0)
{/credit}
