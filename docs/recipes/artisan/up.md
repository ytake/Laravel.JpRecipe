---
Title:    アプリケーションのメンテナンスモードを解除したい
Topics:   artisan
Code:     -
Id:       62
Position: 10
---

{problem}
アプリケーションのメンテナンスモードを解除する必要があります。

アプリケーションの準備ができて、メンテナンスモードの状態になっています。
{/problem}

{solution}
`php artisan up`コマンドが利用できます。

このコマンドはメンテナンスモードのフラグをクリアします。

{php}
$ php artisan up
{/php}
{/solution}

{discussion}
このコマンドはファイルを削除します。

このコマンドは`app/storage/meta/down`というファイルを削除しています。
{/discussion}
