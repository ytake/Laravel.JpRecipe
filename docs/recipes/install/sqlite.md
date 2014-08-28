---
Title:    SQLiteをインストールする
Topics:   installation, SQLite
Code:     -
Id:       119
Position: 14
---

{problem}
PHPでSQLiteを利用できる様にしたい
{/problem}

{solution}
PHPのSQLiteドライバーをインストールします

```bash
$ sudo apt-get install -y php5-sqlite
```

webサーバをリスタートしてください

```bash
$ sudo service (apache2|nginx) restart
```
{/solution}

{discussion}
SQLiteはサーバを必要としません

SQLiteはスタンドアローンのデータベースエンジンです
webアプリケーションではtestなどによく利用されていますが、
小さいアプリケーションで利用するのもおすすめです

こちらも参考にしてください [[SQLiteドライバーの設定方法]]
{/discussion}
