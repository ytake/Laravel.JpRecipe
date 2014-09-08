---
Title:    パスワードリマインダーのマイグレーションを作成する
Topics:   artisan, authentication, password reminders
Position: 19
---

{problem}
パスワードリマインダーを管理するテーブルをつくりたい
{/problem}

{solution}
`php artisan auth:reminders`コマンドを使用します

```bash
$ php artisan auth:reminders
```

`password_reminders`テーブルを作成します

マイグレーション作成後、  
データベースを更新するため、忘れずにマイグレートを実行してください  
実行は下記コマンドです

```bash
$ php artisan migrate
```
{/solution}

{discussion}
Laravelはパスワードリマインダーをすぐに実行できる様に、  
あらかじめ用意しています

利用するにあたって、アプリケーションで必要なリマインダーを実装する必要がありますが、  
基本的にはテーブルを作成するだけで簡単に実装ができます
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27  
[Twitter](https://twitter.com/syossan27)  
[web](http://syossan.hateblo.jp/0)
{/credit}
