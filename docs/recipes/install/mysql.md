---
Title:    MySQLをインストールする
Topics:   installation, MySQL
Code:     -
Id:       19
Position: 5
---

{problem}
Laravelアプリケーションでデータベースを利用したい

お使いの環境にインストールされていない場合は、インストールしてみましょう
{/problem}

{solution}
MySQLをインストールします

*このインストール方法はUbuntu 13.04のものです*

```bash
$ sudo debconf-set-selections <<< \
> 'mysql-server mysql-server/root_password password root'
$ sudo debconf-set-selections <<< \
> 'mysql-server mysql-server/root_password_again password root'
$ sudo apt-get install -y php5-mysql mysql-server
$ cat << EOF | sudo tee -a /etc/mysql/conf.d/default_engine.cnf
> [mysqld]
> default-storage-engine = InnoDB
EOF
$ sudo service mysql restart
```

これは`root`ユーザーにパスワード`root`が設定されています。
デフォルトのストレージエンジンは`InnoDB`に設定しました

仕様や用途でストレージエンジンを使い分けてください
[ストレージエンジンの選択](http://dev.mysql.com/doc/refman/5.1/ja/storage-engine-choosing.html)
{/solution}

{discussion}
MySQLは世界で最も普及しているオープンソースのデータベースです

#### こちらも参照してください

[[MySQLドライバーの設定方法]]
{/discussion}
