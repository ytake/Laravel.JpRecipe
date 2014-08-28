---
Title:    XCacheをインストールする
Topics:   cache, installation, XCache
Code:     Cache
Id:       99
Position: 13
---

{problem}
キャッシュを使って、アプリケーションを高速化させたい
{/problem}

{solution}
XCacheをインストールします

#### Step 1 - XCacheのインストール

```bash
$ sudo apt-get install php5-xcache
```

#### Step 2 - xcache.iniを編集

キャッシュを使用するには、iniファイル内の`xcache.var_size`設定を編集する必要があります
通常このファイルは `/etc/php5/mods-available` にあります

```text
# Find the line
xcache.var_size = 0M

# Change it to
xcache.var_size = 100M
```

#### Step 3 - webサーバの再起動

apacheの場合は、

```bash
$ sudo service apache2 restart
```

nginxの場合は

```bash
$ sudo service php5-fpm restart
$ sudo service nginx restart
```

などとして、お使いの環境に合わせて再起動して下さい
{/solution}

{discussion}
XCacheとは、高速で安定したPHPのオペコードキャッシュプログラムです

Laravelの`Cache`コンポーネントでは、
標準的なget/set/inc/dec をサポートしています

手順については [[キャッシュドライバーにXCacheを利用する]] をご覧ください
{/discussion}
