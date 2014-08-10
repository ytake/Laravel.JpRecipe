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

{php}
$ php artisan migrate
{/php}

実行したマイグレーションを一覧で見ることができます。

マイグレートを実行した時に何が起こっているか見る場合は、`--pretend`オプションを利用します。

{php}
$ php artisan migrate --pretend
{/php}

このコマンドはデータに何が起こっているか全て表示します、しかし実際に変更されるわけではありません。
{/solution}

{discussion}
データベースにシーディングすることも可能です。

シードが設定されていればマイグレーションの実行後に`--seed`オプションを利用することでデータベースがシーディングされます。

[[Seeding Your Database]]レシピを参照して下さい。
{/discussion}
