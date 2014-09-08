---
Title:    Hosts ファイルの編集
Topics:   configuration
Position: 1
---

{problem}
開発等でホスト名を利用したい

複数のアプリケーションをテストするために、異なるホスト名を使用する必要がありますが、  
DNSサーバーにホスト名を設定する必要はありません  
代わりに、_internal_ ホスト名を使用したい。
{/problem}

{solution}
hostsファイルを編集します

次の例では、ホスト名`myapp.localhost.com`で IPアドレス`192.168.100.100`を指します

#### Linuxのhostsファイル編集方法

```bash
$ sudo vi /etc/hosts
```

下記の行を追加します

```text
192.168.100.100   myapp.localhost.com
```

保存して、DNSをフラッシュします

```text
$ sudo service dns-clean start
```

#### OS Xのhostsファイル編集方法

```text
$ sudo nano /private/etc/hosts
```

下記の行を追加します

```text
192.168.100.100   myapp.localhost.com
```

保存して、DNSをフラッシュします

```text
$ dscacheutil -flushcache
```

#### Windowsのhostsファイル編集方法

管理者としてコマンドプロンプトを開きます。

```text
C:\Windows\System32>cd \Windows\System32\drivers\etc
C:\Windows\System32\drivers\etc>notepad hosts
```

下記の行を追加します

```text
192.168.100.100   myapp.localhost.com
```

保存して、DNSをフラッシュします

```text
C:\Windows\System32\drivers\etc>ipconfig /flushdns
```

{/solution}

{discussion}
内部ホスト名に命名規則があります

たとえば、**のMyApp** という名前のアプリケーションの為にいくつかバリエーションがあります

* myapp.local
* myapp.dev
* myapp.localhost.com

{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
