Laravelのインストール方法、それに関連するHomesteadの利用方法です。
どれも簡単にインストールできます。

# インストール方法
## Composerを利用したインストール
Composerコマンドを利用してインストールします。
最新版をインストールする場合は次のコマンドです。

```bash
$ composer create-project laravel/laravel {インストールするディレクトリ} --prefer-dist
```

バージョンを指定してインストールするには次のようにしましょう(例 Laravel4.2)。

```bash
$ composer create-project laravel/laravel {インストールするディレクトリ} 4.2 --prefer-dist
```

## Laravelインストーラ
インストーラは次のComposerコマンドでグローバルインストールします。

```bash
$ composer global require "laravel/installer=~1.1"
```

実行後は`~/.composer/vendor/bin`へパスを通しましょう。
パス記述後はlaravelコマンドの動作確認を行いましょう。

```bash
$ laravel --version
Laravel Installer version 1.2.1
```

アプリケーション作成コマンドは次の通りです。

```bash
$ laravel new プロジェクト名(ディレクトリ)
```

Macを利用している場合は、
vendor/bin/配下のphpunitなどの実行スクリプトのシンボリックリンクが壊れている場合があります。
その場合はvendor配下を一度削除してComposerのinstallコマンドなどを再実行してください。

```bash
$ rm -rf vendor
$ composer install --prefer-dist -o
```
## 実行権限
storageディレクトリ、bootstrap/cacheディレクトリにファイルが書き込まれるため、
この二つのディレクトリに実行権限を与えておきましょう。
(ビルトインサーバを利用する場合はいりません)

```bash
$ chmod -R 777 storage bootstrap/cache;
```

## 動作確認
### webサーバ
webサーバの場合はブラウザからurlへアクセスしてみましょう。
紹介したインストール方法の場合は、
`No supported encrypter found. The cipher and / or key length are invalid.`が表示されます。
これはアプリケーションの暗号化などに利用するセキュリティキーを作成していないためです。
それぞれのアプリケーションで生成する必要がありますので、公式ではこれを生成した状態では提供されません。
かならず `$ php artisan key:generate`を実行しましょう。
(複数台構成のwebアプリケーションの場合はこのキーを共有して利用することを忘れずに)

紹介したインストール方法ではない場合、
開発プロジェクトのソースコードを実行する場合などは、
ブラウザが真っ白になる場合もあるかもしれません。
この場合は、付属の.env.exampleファイルをコピーして `$ php artisan key:generate`を実行しましょう。
面倒な場合は、composer.jsonにこの動作を行うスクリプトを追加しても構いません。

.envファイルが生成済みかどうか確認してなければコピー、`$ php artisan key:generate`を実行する例です。
```php
<?php

$exists = file_exists(__DIR__ . '/.env');
if (!$exists) {
    copy(
        __DIR__ . '/.env.example',
        __DIR__ . '/.env'
    );
    exec('php artisan key:generate');
}

```

composer.jsonのscriptsに上記のスクリプトが実行されるように記述します。

```json
  "scripts": {
    "post-install-cmd": [
      "php env_check.php",
      "php artisan clear-compiled",
      "php artisan optimize"
    ],
    "pre-update-cmd": [
      "php artisan clear-compiled"
    ],
    "post-update-cmd": [
      "php env_check.php",
      "php artisan optimize"
    ],
    "post-root-package-install": [
      "php -r \"copy('.env.example', '.env');\""
    ],
    "post-create-project-cmd": [
      "php artisan key:generate"
    ]
  },
```

Composerのinstall、updateコマンド実行後に実行されます。
このほかにも様々な方法がありますので、開発プロジェクトなどに合わせたものを用意しておくといいでしょう。

### ビルトインウェブサーバ
ビルトインサーバを利用する場合は、次の通りです。

```bash
$ php artisan serve
```

このコマンドは以下のオプションを利用して任意のhostやportが指定できます。
```bash
$ php artisan serve [--host=ホスト名] [--port=ポート番号]
```

上記のそれぞれの環境でLaravel 5がブラウザで表示されることを確認しましょう。

![スクリーンショット 2015-09-15 13.55.06.png](//owl.style.dev.istyle.local/images/2/4310/814371da-1e4b-235e2-d210-674196843f0d.png)

### コンソールでエラーが出る
`Script php artisan clear-compiled handling the pre-update-cmd event returned with an error`
上記のエラーが出る場合は、composer.jsonのpre-update-cmdを一度削除してみましょう。
laravelをインストールしていない状態で`$ composer require hoge/hoge`などを実行すると、
composer.jsonのpre-update-cmdが先に実行されますので、php artisanコマンドが存在しないとして
エラーが返却されます。

# Homestead
Vagrantを利用したLaravelに最適なboxとして公式で用意されているものです。
通常のVagrantと同じように1仮装開発環境として複数のプロジェクトで共有して利用したり、
1プロジェクト1環境のように利用もできます。
ここでは1プロジェクト1環境で利用してみましょう。
*Composer経由でlaravel/homesteadをインストールしなければならないのでローカルにComposerが必要です。*
もし利用している環境にキーがなければ作成しておきましょう。

```bash
$ ssh-keygen -t rsa -C "you@homestead"
```

最初にlaravel前述した方法などでインストールしておきます。
インストールしたディレクトリに移動して、require-devにlaravel/homesteadを追加します。

```bash
$ cd Hoge
$ composer require laravel/homestead --dev
```

インストール後、`$ vendor/bin/homestead make`でVagrantfileや設定ファイルのHomestead.ymlを作成します。
スクリプト実行シェルとしてafter.shがあれば実行されるようになっています。

簡単なものであればそれを用いて記述してしまいましょう。
次の例は日本時間へ変更してメール送信のテストに[MailCatcher](http://mailcatcher.me/)を導入、
いくつかphp.iniを設定するものです。(HomesteadのOSはUbuntu 14.04)

```sh
#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
sudo ln -sf /usr/share/zoneinfo/Japan /etc/localtime
sudo locale-gen ja_JP.UTF-8
sudo /usr/sbin/update-locale LANG=ja_JP.UTF-8

sudo apt-get install -y ruby-dev
sudo gem install mailcatcher
mailcatcher --http-ip=0.0.0.0

block="description \"Mailcatcher\"
start on runlevel [2345]
stop on runlevel [!2345]
respawn
exec /usr/bin/env $(which mailcatcher) --foreground --http-ip=0.0.0.0
"
echo "$block" > "/etc/init/mailcatcher.conf"

sudo echo "opcache.revalidate_freq = 0" >> /etc/php5/mods-available/opcache.ini
sudo echo "xdebug.idekey = PHPSTORM" >> /etc/php5/mods-available/xdebug.ini

grep '^date.timezone = Asia/Tokyo' /etc/php5/fpm/php.ini
if [ $? -eq 1 ]; then
sudo cat >> /etc/php5/fpm/php.ini << "EOF"
date.timezone = Asia/Tokyo
mbstring.language = Japanese
EOF
fi

grep '^date.timezone = Asia/Tokyo' /etc/php5/cli/php.ini
if [ $? -eq 1 ]; then
sudo cat >> /etc/php5/cli/php.ini << "EOF"
date.timezone = Asia/Tokyo
mbstring.language = Japanese
EOF
fi

service nginx restart
service php5-fpm restart
service mailcatcher start

```

環境には次のコマンドで接続します。
PhpStormを利用している場合はメニューから接続できます。

```bash
$ ssh vagrant@127.0.0.1 -p 2222
```

仮想環境の動作確認ができたら、アクセスするPCのhostsにHomestead環境を追加しておきましょう。
homesteadデフォルトは次の通りです。
192.168.10.10  homestead.app

ブラウザからhttp://homestead.app/ へのアクセスを確認してみましょう。
