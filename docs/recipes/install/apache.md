---
Title:    Apacheのインストール
Topics:   Apache, installation
Code:     -
Id:       20
Position: 6
---

{problem}
まだWebサーバがインストールされていないので
Laravelアプリケーションを利用するWebサーバをインストールしたい
{/problem}

{solution}
Apacheをインストールしましょう。

お使いのサーバのOSによってコマンドは異なります
### ubuntu14.04

```bash
$ sudo apt-get install -y apache2 libapache2-mod-php5
$ sudo a2enmod rewrite
$ sudo service apache2 restart
```

サービスで`apache2`を指定して、
restart|start|stopなどを実行して下さい
{/solution}

{discussion}
Apacheはご存知の通り、現在最も普及しているWebサーバです。

インストールの内容にある通り、ApacheでLaravelを利用するには、
**mod-rewrite** が必ず必要となります。
正常に動かない場合は、**mod-rewrite** がインストールされているか忘れずに確認してください。

vhostsの設定方法については、[[Apache VirtualHostの作成]]をご覧ください。
{/discussion}
