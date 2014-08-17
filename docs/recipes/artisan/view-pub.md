---
Title:    パッケージのビューをアプリケーション上で公開したい
Topics:   artisan
Code:     -
Id:       278
Position: 25
---

{problem}
サードパーティのビューをアプリケーションへコピーしたい。
{/problem}

{solution}
`php artisan view:publish`コマンドが利用できます。

```bash
$ php artisan view:publish cool-package
```

このコマンドは`app/views/cool-package`ディレクトリへ必要な設定ファイルを生成します。
{/solution}

{discussion}
Laravel向けでないパッケージの場合、パスの指定が必要になります。

```bash
$ php artisan view:publish cool-package --path=/package/view/dir
```
{/discussion}
