---
Title:    Apache VirtualHostの作成
Topics:   Apache, configuration
Code:     -
Id:       25
Position: 2
---

{problem}
現在Apacheにアクセスすると、デフォルトのページが表示されています

サーバにはすでにApacheがインストールされ、Laravelプロジェクトも作成してある状態です
{/problem}

{solution}
プロジェクトのVirtual Hostを作成しましょう

```bash
$ cd /etc/apache2/sites-available
$ sudo vi myapp.conf
```
**お使いのOSでオペレーションは若干異なります**

`/home/vagrant/projects/myapp`に設置しているとすると・・

```apache
<VirtualHost *:80>
  ServerName myapp.localhost.com
  DocumentRoot "/home/vagrant/projects/myapp/public"
  <Directory "/home/vagrant/projects/myapp/public">
    AllowOverride all
  </Directory>
</VirtualHost>
```

ファイルを保存して、次の様に

```bash
$ cd ../sites-enabled
$ sudo ln -s ../sites-available/myapp.conf
$ sudo service apache2 restart
```

**シンボリックリンクを作成しなくても構いません。お好みのスタイルで作成して下さい**

#### Permissions修正

Vagrantで実行している場合は、権限の問題を回避するために、ユーザーとグループを変更する場合があります

```bash
$ cd /etc/apache2
$ sudo vi envvars
```

```text
export APACHE_RUN_USER=vagrant
export APACHE_RUN_GROUP=vagrant
```

ファイルを保存して、再起動します

```bash
$ sudo service apache2 restart
```
{/solution}

{discussion}
このソリューションでは、いくつか想定しています

1. お使いのApacheのバージョンが `/etc/apache/sites-*` にVirtual Hostを設置するもの
2. Laravelのプロジェクトの設置場所が `/home/vagrant/projects/myapp`
3. ブラウザを通してアクセスするOS環境のhostsファイルに`myapp.localhost.com`を記述してある事

上記の環境の場合は、`http://myapp.localhost.com`にアクセスすると、Laravelプロジェクトにアクセスできる様になります
{/discussion}
