---
Title:    Vagrantをインストールする
Topics:   installation, Vagrant, VirtualBox
Code:     -
Id:       16
Position: 2
---

{problem}
本番に近い環境で開発をしたい

開発環境と本番環境でよくある問題として、
開発環境でエラーが無く、本番環境でエラーが発生するなどのケースが挙げられます
Vagrantを使用する事で、２つの環境の差分を出来る限り無くして環境差分によるエラーなどを
未然に防いだり、または複数人で開発する場合の環境の統一など
様々な問題を解決してくれます
{/problem}

{solution}
[Vagrant](http://www.vagrantup.com/) をインストールして、
開発環境などを管理しましょう


#### Vagrantは仮想化ソフトウェアが必要です

VirtualBox、またはVMWareがインストールされていない場合は、
Vagrantの前にそれらをインストールして下さい
[[VirtualBoxをインストールする]] を参考にして下さい

#### Step 1 - Vagrantのwebサイト

Vagrantのwebページ [Vagrant](http://www.vagrantup.com/) にアクセスしてください

![Vagrant Home Page](/images/vagrant.jpg)

#### Step 2 - ダウンロードとインストール

Vagrantのトップページの *Downloads* から *Latast* をクリックします
_(2014/08/28現在の最新版は v1.6.3です)_

利用しているOSにあったパッケージを選択してダウンロードします
ダウンロード後はそのままインストールします
Vagrantは、Windows、Mac OSX、Linux用のインストーラーを提供しています

#### Step 3 - 動作確認

コンソール(windowsの場合は DOS Command Prompt)で、
`vagrant -v`コマンドを実行して動作確認をします

```bash
$ vagrant -v
```

インストールしたバージョンが表示されます

```bash
Vagrant 1.6.3
```
{/solution}

{discussion}
このレシピでベイグラントのプログラムがインストールされます

現在はLaravelの公式の`box`である
`Laravel Homestead`を利用してLaravelで利用できる様々なツール等が
簡単に素早く入手でき、開発環境もすぐに設定できます

[homestead 日本語](http://laravel4.kore1server.com/docs/42/homestead)
[homestead 英語](http://laravel.com/docs/homestead)

含まれるものは、下記の通りです

`Ubuntu 14.04`
`PHP 5.5`
`Nginx`
`MySQL`
`Postgres`
`Node.js (With Bower, Grunt, and Gulp)`
`Redis`
`Memcached`
`Beanstalkd`
`Laravel Envoy`
`Fabric + HipChat Extension`

Vagrantの最大の利点は、作業環境と運用環境の違いを最小限に抑えることができることです
また、どの環境で動かして同一の環境を持つことができます
{/discussion}
