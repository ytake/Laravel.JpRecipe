---
Title:    公開されているパッケージを利用する
Topics:   artisan
Code:     -
Id:       279
Position: 26
---

{problem}
サードパーティのパッケージをアプリケーションにコピーしたい
{/problem}

{solution}
`php artisan asset:publish`コマンドが利用出来ます

{bash}
$ php artisan asset:publish cool-package
{/bash}

サードパーティのパッケージをアプリケーションの`public/packages/cool-package`ディレクトリへコピーし、
ウェブ上で利用することが出来ます。
{/solution}

{discussion}
Laravel向けではないパッケージでは、パスを指定しなければならない可能性があります。

{bash}
$ php artisan asset:publish cool-package --path=/package/dir
{/bash}

For workbench packages, you can simply specify the workbench name.
ワークベンチのパッケージの場合、ワークベンチ名を指定してください。

{bash}
$ php artisan asset:publish --bench=cool-package
{/bash}
{/discussion}
