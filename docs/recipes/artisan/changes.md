---
Title:    Laravelの変更ログを表示したい
Topics:   artisan
Position: 4
---

{problem}
Laravelフレームワークの変更を見たい。

最新のアップグレードにどんな新機能が追加されたか気になる。
{/problem}

{solution}
`php artisan changes`コマンドが利用できます。

```bash
$ php artisan changes
```

最新の変更点リストが表示されます。
以下のように表示されます。

```text
Changes For Laravel 4.1.x
-------------------------
-> Added new SSH task runner tools.
-> Allow before and after validation rules to reference other fields.
-> Added splice method to Collection class.
-> Rebuild the routing layer for speed and efficiency.
-> Added morphToMany relation for polymorphic many-to-many relations.
-> Make Boris available from Tinker command when available.
-> Allow route names to be specified on resources.
-> Collection `push` now appends. New `prepend` method on collections.
-> Use environment for log file name.
-> Use 'bit' as storage type for boolean on SQL Server.
-> Added QueryException with better formatted error messages.
-> Added 'input' method to Router.
-> Laravel now generates a single laravel.log file instead of many files.
-> Support passing Carbon instances into Cache put style methods.
-> Now using Stack\Builder in Application::run.
-> Added 'whereNotBetween' support to the query builder.
-> Allow passing a view name to paginator's 'links' method.
-> Added new hasManyThrough relationship type.
-> Cloned Eloquent query builders now clone the underlying query builder.
-> Controller method is now passed to missingMethod as first parameter.
-> New @append Blade directive for appending content onto a section.
-> Session IDs are now automatically regenerated on login.
-> Improve Auth::once to get rid of redundant database call.
```
{/solution}

{discussion}
以前のバージョンの変更点も表示したい。

例えばバージョン4.0の変更点を見たい場合は以下のようにコマンドを実行します。

```bash
$ php artisan changes 4.0.x
```

```text
Changes For Laravel 4.0.x
-------------------------
-> Added implode method to query builder and Collection class.
-> Fixed bug that caused Model->push method to fail.
-> Make session cookie HttpOnly by default.
-> Added mail.pretend configuration option.
```

変更ログを表示することはドキュメントの変更点を確認する良いやり方ですが、変更ログに表示されない変更点も数多くあります。

[GitHub](https://github.com/laravel/framework/commits/master) にアクセスして、変更点が全て書かれたリビジョンヒストリーを見て下さい。
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27
(Twitter)[https://twitter.com/syossan27]
(web)[http://syossan.hateblo.jp/]
{/credit}
