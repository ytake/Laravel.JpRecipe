---
Title:    APCをインストールする
Topics:   apc, cache, installation
Code:     -
Id:       91
Position: 10
---

{problem}
キャッシュを使って、アプリケーションを高速化させたい
{/problem}

{solution}
APC (Alternative PHP Cache)をインストールします

コンソールでたった1行のコマンドでインストール出来ます

パッケージでインストール(ubuntuなど)

```bash
$ sudo apt-get install -y php-apc
```

またはpeclでインストールします

```
$ sudo pecl install apcu-beta
```

どちらも簡単にインストール出来ます
インストール後に `extension=apc.so`と追記して、
有効になっているか確認しましょう
{/solution}

{discussion}
LaravelアプリケーションでAPCを活用する方法が二つあります

一つは、APCのオペコードキャッシュがあります
これはPHPのバイトコードコンパイラの結果をキャッシュすることにより、プログラムの実行を高速化します
つまり単純にアプリケーションの処理速度が向上します

もう一つは、アプリケーション内キャッシュドライバーにAPCを使用することができます。
[[キャッシュドライバーにAPCを利用する]] に、APCキャッシュドライバの使用方法が記述されています
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
