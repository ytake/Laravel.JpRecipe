---
Title:    ルートを一覧で見たい
Topics:   artisan, routes
Code:     -
Id:       5
Position: 6
---

{problem}
簡単にルートの一覧を表示したい。

`app/routes.php`ファイルを見ればルートが分かるが、見辛いのでテーブル表示のように全てのルートの一覧を見たい。
{/problem}

{solution}
`php artisan routes`コマンドが利用できます。

```bash
$ php artisan routes
```

このコマンドでコンソール上に見やすいルート一覧が表示されます。

以下は [laravel-recipes](http://laravel-recipes.com) のルート一覧の一部になります。

```
+---------------------------+-------------------------+----------------+
| URI                       | Action                  | Before Filters |
+---------------------------+-------------------------+----------------+
| GET /                     | PageController@home     | cache.get      |
| GET contents              | PageController@contents | cache.get      |
| GET faq                   | PageController@faq      | cache.get      |
| GET topics                | PageController@topics   | cache.get      |
| GET codes                 | PageController@codes    | cache.get      |
+---------------------------+-------------------------+----------------+
```
{/solution}

{discussion}
ルート一覧のフィルタリングは可能です。

**ho** から始まるルートのみフィルタリングする場合は以下のように行います。

```bash
$ php artisan routes --name=ho
```

また、ルートのパスをフィルタリングする場合は`--path=`オプションが使用できます。

```bash
$ php artisan routes --path=c
```
上記のコマンドは **c** で始まるパスのルートを表示します。
{/discussion}
