---
Title:    データベースでのシーディング
Topics:   artisan
Code:     -
Id:       69
Position: 17
---

{problem}
データベースでシードを使用したいです。

データベースのシードは既に記述していて、Laravelでそのシードを使用したいです。
{/problem}

{solution}
`php artisan db:seed`コマンドが利用できます。

```bash
$ php artisan db:seed
```

ルートシーダとは違ったクラスを使用している場合、`--class`オプションが使用できます。

```bash
$ php artisan db:seed --class=MyDatabaseSeeder
```
{/solution}

{discussion}
シーディングは通常テスト用に使われます。

開発マシン上で標準なレコードを生成しておく場合には良い方法です。
{/discussion}
