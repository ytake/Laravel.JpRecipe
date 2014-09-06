---
Title:    アプリケーションのメンテナンスモードを解除したい
Topics:   artisan
Position: 10
---

{problem}
アプリケーションのメンテナンスモードを解除する必要があります。

アプリケーションの準備ができて、メンテナンスモードの状態になっています。
{/problem}

{solution}
`php artisan up`コマンドが利用できます。

このコマンドはメンテナンスモードのフラグをクリアします。

```bash
$ php artisan up
```
{/solution}

{discussion}
このコマンドはファイルを削除します。

このコマンドは`app/storage/meta/down`というファイルを削除しています。
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27
(Twitter)[https://twitter.com/syossan27]
(web)[http://syossan.hateblo.jp/]
{/credit}
