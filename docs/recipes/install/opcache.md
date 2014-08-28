---
Title:    OPcacheのインストール
Topics:   cache, installation, OPcache
Position: 15
---

{problem}
キャッシュを使って、アプリケーションを高速化させたい

php5.5環境ではOPcacheが標準となっています
5.5以前の環境の場合は導入して高速化させてみましょう
{/problem}

{solution}
OPcacheをインストールします

```bash
$ pecl install zendopcache-beta
```

OPcacheはコンパイル済みのバイトコードを共有メモリに保存して、
リクエストのたびにスクリプトを読み込んでパースする手間を省いてパフォーマンスを向上させます

インストール後に `extension=opcache.so` を追記して、
有効になっているか確認しましょう


一般に推奨されている設定は下記の様になっています

```text
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=4000
opcache.revalidate_freq=60
opcache.fast_shutdown=1
opcache.enable_cli=1
```

`opcache.revalidate_freq`は好みによって下記の様に設定してください

```text
opcache.revalidate_freq=0
```

{/solution}

{discussion}
OPcacheは様々な設定ができます

詳細については公式リファレンスを参考にしてください
[OPcache](http://php.net/manual/ja/opcache.installation.php)

{/discussion}

{credit}
Author:Yuuki Takezawa
{/credit}
