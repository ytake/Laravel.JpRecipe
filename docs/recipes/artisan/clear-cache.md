---
Title:    アプリケーションキャッシュをクリアしたい
Topics:   artisan, cache
Position: 23
---

{problem}
アプリケーションキャッシュをクリアしたい
{/problem}

{solution}
`php artisan cache:clear`コマンドが利用できます。

```bash
$ php artisan cache:clear
```
{/solution}

{discussion}
このコマンドは以下の２つのことを行っています。

1. キャッシュを空にするために`Cache::flush()`呼び出されます。
2. `app/storage/meta/services.json`ファイルは削除され、
   アプリケーションで使用しているサービスプロバイダの読み込みを最適化しようとします。

_このコマンドはローカルファイルシステムからファイルを削除するので、アプリケーションが動いている複数のサーバを持っている場合は上記のコマンドをそれぞれのサーバで実行する必要があります。_
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:syossan27
(Twitter)[https://twitter.com/syossan27]
(web)[http://syossan.hateblo.jp/]
{/credit}
