---
Title:    リモートサーバのログファイルを追跡したい
Topics:   artisan
Code:     -
Id:       281
Position: 28
---

{problem}
アプリケーションのログファイルの内容を見たい。

ログをリアルタイムで表示したい。
{/problem}

{solution}
`php artisan tail`コマンドが利用できます。

コマンドを実行するとローカルアプリケーションにある`app/storage/logs/laravel.log`の内容が表示されます。

{bash}
$ php artisan tail
...
log contents
...
{/bash}

ログの追跡を止めるには`Ctrl+C`を押します。

`app/config/remote.php`にリモート接続の設定を行うと、リモートマシン上のログファイルを追跡することができます。

{bash}
$ php artisan tail remote-name
...
log contents
...
{/bash}

ログの追跡を止めるには`Ctrl+C`を押します。

{/solution}

{discussion}
非標準のログファイルには`--path`オプションを利用します。

{bash}
$ php artisan tail --path=/full/path/to/log.file
{/bash}
{/discussion}
