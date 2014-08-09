---
Title:    LaravelでREPLを行いたい
Topics:   artisan
Code:     -
Id:       280
Position: 27
---

{problem}
アプリケーションと簡単に対話したい。
{/problem}

{solution}
`php artisan tinker`コマンドが利用できます。

このコマンドは設定が既に読み込まれているPHPアプリケーションのためのREPL (Read-Eval-Print Loop)を提供しています。

{text}
$ php artisan tinker
[1] > echo Config::get('app.url');
http:://your.app.url
[2] > exit;
{/text}

データベースへのアクセス、モデルを使うなどが可能です。

{text}
$ php artisan tinker
[1] > $user = User::find(1);
->object(User)(
  'incrementing' => true,
  'timestamps' => true,
  'exists' => true
)
[2] > echo $user->name;
Chuck
[3] > exit;
{/text}
{/solution}

{discussion}
tinkerコマンドは_Boris_を使っています。

_Boris_はPHPのための小さく、堅実なREPLです。
[github.com/d11wtq/boris](https://github.com/d11wtq/boris)のページをチェックしてみてください。

{tip}
tinkerコマンドが動作しない場合は`php.ini`の`disable_functions`の設定に`pcntl_()`関数が含まれている可能性が非常に高いです。
`php.ini`のこの行をコメントアウトし、tinkerを使用できるようにする必要があります。
{/tip}
{/discussion}
