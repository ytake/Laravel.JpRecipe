---
Title:    データベースマイグレーションを実行したい
Topics:   artisan, migrations
Code:     -
Id:       65
Position: 13
---

{problem}
データベースマイグレーションを実行したい。
{/problem}

{solution}
`php artisan migrate`コマンドが利用できます。

```bash
$ php artisan migrate
```

実行したマイグレーションを一覧で見ることができます。

マイグレートを実行した時に何が起こっているか見る場合は、`--pretend`オプションを利用します。

```bash
$ php artisan migrate --pretend
```

このコマンドはデータに何が起こっているか全て表示します、しかし実際に変更されるわけではありません。
{/solution}

{discussion}
データベースにシーディングすることも可能です。

シードが設定されていればマイグレーションの実行後に`--seed`オプションを利用することでデータベースがシーディングされます。

[[データベースでのシーディング]]レシピを参照して下さい。
{/discussion}
