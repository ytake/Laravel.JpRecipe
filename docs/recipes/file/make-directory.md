---
Title:    ディレクトリを作成する
Topics:   file system
Position: 23
---

{problem}
ディレクトリを作りたい
{/problem}

{solution}
`File::makeDirectory()` メソッドを利用します

複数の引数が使用できます

デフォルトで、ディレクトリを作りたいパスを指定して作成する事が出来ます

```php
$result = \File::makeDirectory('/path/to/directory');
```

`/path/to`ディレクトリに`directory`が作成された場合に `true` が返却されます
作成されるディレクトリのファイルモードは`0777`です

ファイルモードを指定することができます

```php
$result = \File::makeDirectory('/path/to/directory', 0775);
```

`/path/to`ディレクトリに`directory`が作成された場合に `true` が返却されます
ファイルモードは`0775`でディレクトリが作成されます

ディレクトリを再帰的に作成することもできます

```php
$result = \File::makeDirectory('/path/to/directory', 0775, true);
```

これは `/path` が存在しない場合はそれを作成します
また `/path/to` が存在しない場合も同様に作成し、
最後に `/path/to/directory` が作成されます
正常に作成された場合に`true`が返却されます
{/solution}

{discussion}
滅多に使われませんが、第四引数を利用する事もできます

```php
$result = \File::makeDirectory('/path/to/directory', 0775, true, true);
```

第四引数のオプションは`$force`で、
作成に失敗した場合でもエラー出力が抑制されます
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
