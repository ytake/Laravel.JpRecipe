---
Title:    PHPのビルトインサーバを動かしたい
Topics:   artisan
Code:     -
Id:       282
Position: 29
---

{problem}
Laravelアプリケーションのテストを素早くやりたい。

けど、Webサーバの設定はしたくない。
{/problem}

{solution}
`php artisan serve`コマンドが利用できます。

```bash
$ php artisan serve
Laravel development server started on http://localhost:8000
```

ブラウザ上で`http://localhost:8000`にアクセスすると、アプリケーションが見れるようになりました。

`Ctrl-C`を押すことでサーバは停止できます。
{/solution}

{discussion}
別のポートを指定するには`--port`オプションを利用します。

デフォルト以外のポートを使用するには以下のように指定します。

```bash
$ php artisan serve --port=8080
Laravel development server started on http://localhost:8080
```
{/discussion}
