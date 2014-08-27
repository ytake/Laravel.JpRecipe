---
Title:    Nginxをインストールする
Topics:   installation, Nginx
Code:     -
Id:       21
Position: 7
---

{problem}
まだWebサーバがインストールされていないので
Laravelアプリケーションを利用するWebサーバをインストールしたい
{/problem}

{solution}
Nginxをインストールします

*このインストール方法はUbuntu 13.04のものです*

```bash
$ sudo apt-get install -y php5-fpm nginx
$ sudo service nginx start
```
{/solution}

{discussion}
Nginxの読み方は、"エンジン-エックス"です

Nginxは技術者に好まれるwebサーバで急速に広まっています

Nginxは高速で、設定も簡単で、Apacheのようにメモリを多く使いません

[[Nginx VirtualHostの作成]] も参考にしてください
{/discussion}
