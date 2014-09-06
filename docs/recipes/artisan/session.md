---
Title:    セッション用のマイグレーションを作成したい
Topics:   artisan
Position: 18
---

{problem}
データベースのセッションを保存するテーブルを作成する必要があります。
{/problem}

{solution}
`php artisan session:table`コマンドが利用できます。

```bash
$ php artisan session:table
```

このコマンドはただマイグレーションを作成しているだけなことに注意して下さい。
まだマイグレーションを実行する必要があります。

```bash
$ php artisan migrate
```
{/solution}

{discussion}
データベースセッションを使う場合のみ、これは必須です。

`database`に`app/config/session.php`でドライバの変更をする場合、セッションを保存するテーブルを作成する必要があります。
このコマンドはそれを手助けしてくれます。
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27
(Twitter)[https://twitter.com/syossan27]
(web)[http://syossan.hateblo.jp/]
{/credit}
