---
Title:    メンテナンスモードを作成したい
Topics:   artisan
Code:     -
Id:       61
Position: 9
---

{problem}
メンテナンスモードをアプリケーションに置きたいです。

メンテナンスモードの間は、データベースの更新やその他の変更を行うためにユーザがアクセス出来ないようにしたい。
{/problem}

{solution}
`php artisan down`コマンドが利用できます。

このコマンドはメンテナンスモードフラグを設定します。

{php}
$ php artisan down
{/php}
{/solution}

{discussion}
メンテナンスモードの操作を忘れないようにしてください。

[[Registering a Maintenance Mode Handler]]レシピを見て下さい。

このコマンドが何をしているかというと、`app/storage/meta/down`に空のファイルを作成しています。
このファイルがメンテナンスモードのフラグになっています。

Webファーム内の複数のマシンでアプリケーションが動いている場合、各マシン上で`php artisan down`コマンドの実行が必要になります。
{/discussion}
