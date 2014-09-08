---
Title:    LaravelでREPLを行いたい
Topics:   artisan
Position: 27
---

{problem}
アプリケーションと簡単に対話したい
{/problem}

{solution}
`php artisan tinker`コマンドが利用できます

このコマンドは設定が既に読み込まれているPHPアプリケーションのためのREPL (Read-Eval-Print Loop)を提供しています

```bash
$ php artisan tinker
[1] > echo Config::get('app.url');
http:://your.app.url
[2] > exit;
```

データベースへのアクセス、モデルを使うなどが可能です

```bash
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
```
{/solution}

{discussion}
tinkerコマンドは _Boris_ を使っています

_Boris_ は軽量で堅実なREPLです
[github.com/d11wtq/boris](https://github.com/d11wtq/boris) をチェックしてみてください

tinkerコマンドが動作しない場合は`php.ini`の`disable_functions`の設定に`pcntl_()`関数が含まれている可能性が非常に高いです  
`php.ini`のこの行をコメントアウトし、tinkerを使用できるようにする必要があります
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27  
[Twitter](https://twitter.com/syossan27)  
[web](http://syossan.hateblo.jp/0)
{/credit}
