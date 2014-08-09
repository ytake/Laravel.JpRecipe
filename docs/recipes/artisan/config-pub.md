---
Title:    パッケージ設定をアプリケーション上で公開したい
Topics:   artisan
Code:     -
Id:       277
Position: 24
---

{problem}
サードパーティの設定をアプリケーション上にコピーしたい。
{/problem}

{solution}
`php artisan config:publish`コマンドが利用できます。

{bash}
$ php artisan config:publish cool-package
{/bash}

このコマンドは必要な設定ファイル全てを`app/config/packages/cool-package`ディレクトリに生成します。

多くの場合は、ファイル名称を単に`config.php`にすることでしょう。
{/solution}

{discussion}
Laravel向けでないパッケージではパスを明記する必要性があります。


{bash}
$ php artisan config:publish cool-package --path=/some/config/dir
{/bash}
{/discussion}
