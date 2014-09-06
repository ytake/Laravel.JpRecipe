---
Title:    マイグレーションリポジトリを作成したい
Topics:   artisan, migrations
Position: 11
---

{problem}
マイグレーションリポジトリを作成したい。

マイグレーションリポジトリが全てのデータベースマイグレーションをリストとして持っていることは知っていると思います。
いくつかのマイグレーションは作成準備ができていると思いますので、マイグレーションリポジトリの作成をしてみます。
{/problem}

{solution}
`php artisan migrate:install`コマンドが利用できます。

```bash
$ php artisan migrate:install
```
{/solution}

{discussion}
このコマンドは必ずしも必要というわけではありません。

Laravelは自動的に必要なマイグレーションリポジトリを作成します。
ただ、もしデータベースが正しく設定されているかのテストを作成したい場合はこのコマンドを使うことになるでしょう。
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27
(Twitter)[https://twitter.com/syossan27]
(web)[http://syossan.hateblo.jp/]
{/credit}
