---
Title:    storageディレクトリの変更
Topics:   configuration
Position: 7
---

{problem}
Laravelのstorageディレクトリを変更したい

storageディレクトリは、テンプレートのキャッシュファイルの書き込みや、セッション等ファイルを利用する場合に、  
インストールした状態のままの場合、実行権限が無いため書き込みエラーなどが発生します
{/problem}

{solution}
`bootstrap/paths.php`を編集してstorageのパスを任意のディレクトリに変更しましょう

```php
// この行を変更します
'storage' => __DIR__.'/../app/storage',

//
'storage' => '/home/myname/storage/path',
```

それぞれが利用するディレクトリを忘れずに作成してください

```bash
$ mkdir /home/myname/storage/path
$ mkdir /home/myname/storage/path/views
$ mkdir /home/myname/storage/path/meta
$ mkdir /home/myname/storage/path/logs
```

`sessions`と`cache`で`file`を利用する場合は、  
それぞれに対応したディレクトリを作成して下さい
{/solution}

{discussion}
環境によってはパーミッションを変更する必要があります

ほとんどの場合はLaravelが提供するデフォルトのストレージディレクトリで正常に機能します  
環境によっては実行権限を与える必要があります  
[[storageディレクトリの実行権限を変更する]].
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
