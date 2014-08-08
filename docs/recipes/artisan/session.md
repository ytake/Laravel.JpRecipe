---
Title:    セッション用のマイグレーションを作成したい
Topics:   artisan
Code:     -
Id:       70
Position: 18
---

{problem}
データベースのセッションを保存するテーブルを作成する必要があります。
{/problem}

{solution}
`php artisan session:table`コマンドが利用できます。

{php}
$ php artisan session:table
{/php}

このコマンドはただマイグレーションを作成しているだけなことに注意して下さい。
まだマイグレーションを実行する必要があります。

{php}
$ php artisan migrate
{/php}
{/solution}

{discussion}
This is only needed if you use database sessions.
データベースセッションを使う場合のみ、これは必須です。

`database`に`app/config/session.php`でドライバの変更をする場合、セッションを保存するテーブルを作成する必要があります。
このコマンドはそれを手助けしてくれます。
{/discussion}
