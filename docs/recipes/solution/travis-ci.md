---
Title:    LaravelプロジェクトでTravis CIを使った継続的インテグレーション
Topics:   solution
Code:     -
Id:       75
Position: 1
---

{problem}
LaravelプロジェクトでTravis CIを利用した継続的インテグレーションを始めたい
{/problem}

{solution}
Travis CIを利用するには、GitHubを利用している事が前提となります。  
すでにGitHubのアカウントをお持ちであれば、  
そのアカウントを使ってTravis CIにログインをして、  
利用したいリポジトリを選択するだけです。  
次に選択されたリポジトリに、`.travis.yml`が設定されている必要があります。  

ベーシックなファイルは以下の通りです。
```
language: php
php:
  - 5.4
  - 5.5
  - 5.6
  - hhvm

before_script:
  - composer self-update
  - composer install
  - chmod -R 777 app/storage

script:
  - phpunit

notifications:
  emails:
    - あなたのメールアドレス
```
`php`でどのバージョンを利用するか指定します。  
LaravelはHHVMでも完全に動作します。  
ここではphp5.4からHHVMまでを利用してテストを行います。  

`befor_script`でテストが実行される前に実行したいスクリプトを記述しましょう。  
ここでは、composerでライブラリやLaravelをインストールし、  
storageに実行権限を与えています。  

あとは phpunitを実行する様に指定します。  

`notifications`で、結果をメール等で通知する事ができます。  

準備が整ったらpush時に動作するか確認してみましょう。
{/solution}

{discussion}
Travis CIの利用方法は様々です。  
また広く利用されているデータベースも利用する事ができます。  
用意されているデータベースは次の通りです。  
`MySQL`  
`PostgreSQL`  
`MongoDB`  
`CouchDB`  
`Redis`  
`Riak`  
`RabbitMQ`  
`Memcached`  
`Cassandra`  
`Neo4J`  
`ElasticSearch`  
`Kestrel`  
`SQLite3`  

他にも多くのCIサービスがあります。  
利用している環境や、利用出来る機能等で選択肢は様々ですがどのサービスも気軽に利用出来ます。
{/discussion}
