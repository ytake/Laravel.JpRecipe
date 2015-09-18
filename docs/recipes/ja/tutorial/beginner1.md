# Laravel
Laravelはフルスタックフレームワークであり、様々なコンポーネントが提供されています。
必ずしも用意されているコンポーネントを使わなければならないわけではなく、
コンポーネントを好みのライブラリに変更したり、または機能を拡張したり、といったことが簡単に行えます。
Laravelは[Composer](https://getcomposer.org/)を利用しています。
以前phpでよく利用されていた*require*や*include*は記述しません。
Composerによってすべてのコンポーネントが自動で読み込まれます(オートロード)。
フレームワーク自体が依存しているライブラリの導入や、任意のライブラリを追加する場合なども
直接ディレクトリに置かず、Composerを利用しましょう。

Composerは次のコマンドでインストールします。

```bash
$ curl -sS https://getcomposer.org/installer | php
```

Windows環境の場合はインストーラも利用できます。
[installation-windows](https://getcomposer.org/doc/00-intro.md#installation-windows)

フレームワークが依存するライブラリはvendor配下に配置されますが(composer.jsonで変更できます)、
管理はComposerが行うためvendor配下のソースコードを直接変更してはいけません。
フレームワークやライブラリのアップデートで変更が削除されます。
アップデートを行わない場合は、バグフィックスなどが受けられないことになります。
動作を変更する場合は継承などを行ってください。

またフレームワーク自体は[SymfonyComponent](http://symfony.com/components)をはじめ、
様々なライブラリを利用して構築されています。
フレームワークのマニュアルなどに記載されているメソッドのほか、
各ライブラリの利用方法も理解しておけば、様々な機能を使いこなすことができます。

# Laravel5.1を使うにあたって
Laravel5.0.33までは**php5.4.0**以上であれば利用できますが、
Laravel5.1.0以降は**php5.5.9**以上でなければいけません。
また以前のバージョンで必要とされていたMcryptエクステンションからOpenSSLへ変更されています。

サーバにインストールされているエクステンションは次のコマンドで確認できます。

```bash
$ php -m
[PHP Modules]
aop
apc
apcu
bcmath
bz2
calendar
Core
ctype
curl
date
dom
ereg
exif
fileinfo
filter
ftp
gd
gettext
hash
iconv
imap
intl
json
ldap
libxml
mbstring
mcrypt
memcached
mongo
msgpack
mysql
mysqli
mysqlnd
openssl
pcntl
pcre
PDO
pdo_mysql
pdo_pgsql
pdo_sqlite
pgsql
Phar
phpiredis
posix
readline
Reflection
session
SimpleXML
soap
sockets
SPL
sqlite3
standard
tokenizer
v8js
wddx
xdebug
xml
xmlreader
xmlwriter
xsl
yaz
Zend OPcache
zip
zlib
zmq

[Zend Modules]
Xdebug
Zend OPcache
```

## 必須ではないが利用すると良いエクステンション
### Zend Opcache
現行のphpにはほぼ標準でインストールされます。
このエクステンションはオペコードキャッシュで、phpコードコンパイル後、
バイトコードを共有メモリに保持して、再利用します。
これによりphpコードのパース、コンパイルの時間を短縮して負荷を低減させます。
以前利用されていたapcよりも20%前後パフォーマンスが向上します。
ただしユーザーデータのキャッシュには利用できません。

### Xdebug
XdebugはPHPのデバッグ用エクステンションで、デバッグのみならずPHPUnitなどのライブラリでも利用されています。
最近ではPhpStormなどのIDEを通じて簡単に利用できるため、
phpアプリケーション開発でよく利用されています。
含まれていない場合は次のコマンドでインストールしてください。 

```bash
$ pecl install xdebug
```

### XHProf
Facebookが開発したPHPプロファイラです。
メソッドの呼び出し回数やCPUやメモリ使用量や、アプリケーションのボトルネックなどを可視化させてレポートします。
利用する場合は次のコマンドでインストールしてください。

```bash
$ pecl install xhprof-beta
```

### Memcached
インメモリキャッシュシステムのmemcachedを利用するためのエクステンションです。
Laravelではキャッシュやセッションなどのドライバとして利用できます。

# アーキテクチャ
## 基本機能
Laravelが提供している基本機能は次の通りです。

### ルーティング
uriに紐づくクラスや、クロージャなどをマッピングします。
コントローラクラスは必須ではありません。

### ミドルウェア
ルーティングで決定された処理を行うまでのHttp処理を担当します。
玉ねぎのような構造となります。
![middleware.png](//owl.style.dev.istyle.local/images/5/2311/69acf8d4-4dea-d9e87-e8de-ec77e56084ea.png)
通過前後の処理が実装できます。

### リクエスト
Laravelのリクエストコンポーネントは`Symfony\Component\HttpFoundation\Request`クラスを継承しています。
PSR-7に対応していますので、任意のライブラリに変更できます。
[symfony/psr-http-message-bridge](https://github.com/symfony/psr-http-message-bridge)
[zendframework/zend-diactoros](https://github.com/zendframework/zend-diactoros)

### レスポンス
レスポンスは`Symfony\Component\HttpFoundation\Response`クラスを継承しています。
ファイルダウンロードやJSON、JSONPの返却、レンダリングされたコンテンツの返却がデフォルトで利用できます。
xmlやHALなどを利用したい場合はmacroや独自のレスポンスクラスを追加して対応します。

### ビュー
LaravelではビューテンプレートとしてBladeが提供されています。
Bladeを利用せずに通常のphpコードを利用しても構いません。
このほかにサードパーティでTwig、Smarty、mustache、PHPTALなどが利用できます。


## ディレクトリ ストラクチャ
デフォルトで用意されているディレクトリは次の通りです。
### app
アプリケーションの実装コードを設置するディレクトリ
他のディレクトリにする場合はcomposer.jsonで変更してください。

### bootstrap
フレームワークの準備コード、オートローダがあります。
フレームワーク自体のコンパイルファイル、services.jsonなどはbootstrap/cacheに設置されます。

### config
設定ファイルディレクトリです。

### database
マイグレーションファイル、シーダー、モデルファクトリ(Faker)等が設置されています。

### public
アプリケーションの公開ディレクトリです。
htdocsやほかの名前でも構いません。

### resources
デフォルトではビューテンプレート、アセットファイル、多言語対応の国際化ファイルなどが設置されています。

### storage
アプリケーションのストレージディレクトリです。
フレームワークのログはstorage/logs、
ビューテンプレートのコンパイルファイル、ファイルセッション、キャッシュはstorage/frameworkが利用されます。
storage/appはアプリケーションのストレージディレクトリとして利用できます(アップロードされた画像を置くなど)。

### tests 
テストコードディレクトリです。
`tests/TestCase.php`はオートローダでclassmapとしています。
本番環境へのリリースなどで`$ composer install --no-dev`とする場合はautoload-dev配下はロードされません。
このため、tests配下にはテストコード以外は含めないようにしましょう。

## appディレクトリ ストラクチャ
アプリケーションディレクトリはデフォルトでいくつかディレクトリが用意されています。

### Console
Artisanコマンドのアプリケーションディレクトリです。
`Commands`はコマンドラインアプリケーションを設置し、
`Kernel.php`は開発したコマンドラインアプリケーションを登録します。
登録方法はこのほかの方法も提供されています。

### Events
アプリケーションで利用するイベントクラスのコードを設置します。

### Exceptions
アプリケーションのエラーハンドリング関連コードを設置します。
デフォルトではHandler.phpが設置されています。
変更する場合は`bootstrap/app.php`が利用できます。

### Http
このディレクトリは主にHttpに関連するクラスが設置されています。
`Controllers`はコントローラクラス、
`Middleware`はHttpリクエストのミドルウェアクラス、
`Requests`はフォームリクエストクラスが設置されています。
`Kernel.php`はアプリケーションにミドルウェアクラスの登録を行います。
変更する場合は`bootstrap/app.php`が利用できます。
`routes.php`はアプリケーションのルーティングが記述できます。
デフォルトで`routes.php`が指定されていますが、ほかのファイルやほかの仕組みを用いても構いません。

### Jobs
主にQueue関連のクラスを設置します。
Laravel5ではCommandBusと呼ばれていました。

### Listeners
イベントクラスのリスナーを設置します。

### Policies
アプリケーションのポリシー(認可機能)を設置します。
この機能はオプショナルのため、利用しない場合はアップグレードに含めなくて構いません。
ポリシーは、アプリケーションのロール制御などに利用します。

### Providers
Laravelのサービスコンテナにアプリケーション特有の処理を登録したり、
コンポーネントの拡張などに利用するサービスプロバイダクラスを設置します。
この機能のほとんどはHttpリクエストを受けて初期に実行されます。

## ディレクトリをどう使えば良いのか？
これ以外のディレクトリは開発者が自由に作成できます。
またデフォルトで用意されているディレクトリも自由に変更できます。
Composerがクラスのロードを管理していますので、
autoloadで指定しているpsr-4の規約に準拠した名前空間を利用してください。

## MVCフレームワークではないの？
LaravelフレームワークでMVCは強制されていません。
MVCは処理の構造パターンの一つであって、それに従って開発者が自由に定義付けることができます。
例えばMVCでよく言われるModelディレクトリが必要であれば、Modelsディレクトリなどを作成しましょう。
![basic_mvc.png](//owl.style.dev.istyle.local/images/7/7398/ae36b6d9-524e-39ee0-8153-f72d79876a67.png)

Controllerと呼ばれる処理を実装するにあたり、クラス名やディレクトリを`Action`にしても構いませんし、
Modelは`Domain`としても構いません。
MVCではディレクトリ名がそれを示さなければならない、というルールはありません。

比較に挙げられるRoRと類似していると言われることも多いですが、
「設定より規約」(CoC:Convention over Configuration)としていくつかの機能(HTTPプレフィックスを利用したルーティングなど)は提供されていますが、
フレームワークとしては採用していません。
このためMVCフレームワークです、とも公式では謳っていません。

ファイル作成系のコマンドは全てpsr-4に対応していますので、次のように実行すると任意のディレクトリに設置されます。

```bash
$ php artisan make:model App\\Istyle\\Models\\Hoge
```

## データベース
Laravelのデータベースコンポーネントは、PDOを拡張して利用しています。
デフォルトでMySQL、PostgreSQL、SQLite、SQL Serverがサポートされていますので、
同じPDOドライバを利用するMariaDBやH2データベースといったものはそのまま利用できます。
このほかにもサードパーティによるデータベースドライバが多く提供されています。

## キャッシュ
ユーザーデータのキャッシュなどにはファイルキャッシュ、apc(apcu)、
データベース、memcached、Redisが利用でき、
このほかにもデフォルトでXCache、WinCacheも利用できます。
ほかにもテスト用途として配列を利用するarrayドライバや、なにも返さないnullドライバが利用できます。

## セッション
セッションストレージとしては、ファイルセッション、Cookieセッション、
データベース、apc(apcu)、memcached、Redisが利用できます。
ほかにもテスト用途として配列を利用するarrayドライバが利用できます。

## メール
メールにはsmtp、mail、sendmailをはじめ、[Mailgun](https://www.mailgun.com/)、[Mandrill](https://www.mandrill.com/)、[Amazon Simple Email Service](https://aws.amazon.com/jp/ses/)が利用でき、
テスト用途としてlogが利用できます。

## ファイルストレージ
ローカルディスクを利用するlocal、ftpによるアップロードなどを利用するftp、
s3、rackspaceが利用できます。
内部で[thephpleague/flysystem](http://flysystem.thephpleague.com/)を利用していますので、
このライブラリがサポートしているAzureやDropboxといったストレージサービスドライバも追加することで簡単に利用できます。

## ジョブキュー
ジョブキューにはなにもしないnull、非同期として処理しないsync(同期処理となります)、
データベース、beanstalkd、[Amazon Simple Queue Service](https://aws.amazon.com/jp/sqs/)、
[Iron.io](http://www.iron.io/)、Redisが利用できます。

## ブロードキャスト
イベントにブロードキャストが利用できます。
ブロードキャストはRedis(Node.jsなどによるクライアントが必要となります)、
[Pusher](https://pusher.com/)が利用できます。
ほかにもテスト用途としてlogが利用できます。
