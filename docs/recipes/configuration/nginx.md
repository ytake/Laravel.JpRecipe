---
Title:    Nginx VirtualHostの作成
Topics:   configuration, Nginx
Position: 3
---

{problem}
現在Nginxにアクセスすると、デフォルトのページが表示されています

サーバにはすでにNginxがインストールされ、Laravelプロジェクトも作成してある状態です
{/problem}

{solution}
プロジェクトのNginx　Virtual Hostを作成しましょう

```bash
$ cd /etc/nginx/sites-available
$ sudo vi myapp
```

下記の様な場合、

```nginx
server {
    listen 80;
    server_name myapp.localhost.com;
    root /home/vagrant/projects/myapp/public;

    location / {
        index index.php;
        try_files $uri $uri/ /index.php?q=$uri&$args;
    }

    error_page 404 /index.php;

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_index index.php;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_param PATH_INFO $fastcgi_path_info;
        fastcgi_param PATH_TRANSLATED $document_root$fastcgi_path_info;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}
```

ファイルを保存して、次の様に

```bash
$ cd ../sites-enabled
$ sudo ln -s /etc/nginx/sites-available/myapp
$ sudo service nginx restart
```

#### Permissions修正

Vagrantで実行している場合は、権限の問題を回避するために、ユーザーとグループを変更する場合があります

```bash
$ cd /etc/php5/fpm/pool.d
$ sudo vi www.conf
```

`user` と `group`の行を変更して下さい

```text
user = vagrant
group = vagrant
```

ファイルを保存し、PHPのFastCGI Process Managerを再起動します

```text
$ sudo service php5-fpm restart
```

{/solution}

{discussion}
Nginxのは、多くの設定オプションがあります

上記の設定はLaravelを動作させる基本的な設定ですが、  
Nginxは、柔軟性と、強力な処理能力を提供します  
詳細については、[Nginx Website](http://wiki.nginx.org/Main)をご覧ください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
