---
Title:    Memcachedインストール方法
Topics:   cache, installation, memcached
Code:     -
Id:       93
Position: 11
---

{problem}
アプリケーションで、ファイルセッションやファイルキャッシュなどよりも早い実行速度が必要
{/problem}

{solution}
memcachedをインストールしましょう

**ubuntu**
```bash
$ sudo apt-get install -y memcached php5-memcached
$ sudo service apache2 restart
```
最初のコマンドでmemcachedパッケージをインストールして、  
忘れずにapache / Nginxを再起動します
{/solution}

{discussion}
memcachedをcache等で利用するには設定をする必要があります

指定方法は[[Setting up the Memcached Cache Driver]]をご覧ください
{/discussion}
