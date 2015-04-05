---
Title:    パターンに一致するファイルを検索する
Topics:   file system
Position: 19
---

{problem}
パターンに一致するファイルを検索したい
{/problem}

{solution}
`File::glob()` メソッドを利用します

```php
$log_files = \File::glob('/test/*.log');
if ($log_files === false) {
    die("エラーが発生しました");
}
```

メソッドにフラグを指定することができます

```php
$dir_list = \File::glob('/test/*', GLOB_ONLYDIR);
if ($dir_files === false) {
    die("エラーが発生しました");
}
```

有効なフラグは次のとおりです:

* `GLOB_MARK` - 返却された各ディレクトリにスラッシュを追加します
* `GLOB_NOSORT` - ディレクトリに表示されるファイルを返却します (ソートはされません) 指定しない場合はパス名をアルファベット順にソートします
* `GLOB_NOCHECK` - 一致するファイルが見つからなかった場合、検索パターンを返却します
* `GLOB_NOESCAPE` - バックスラッシュによるメタ文字のクォートを行いません
* `GLOB_BRACE` -  {a,b,c} を展開し「a」、「b」あるいは「c」のいずれかにマッチさせます
* `GLOB_ONLYDIR` - パターンにマッチするディレクトリのみを返します
* `GLOB_ERR` - (ディレクトリが読めないなどの) 読み込みエラー時に停止します デフォルトではエラーは無視されます

一致したものが無い場合は空の配列、エラー時は`false`が返却されます

一部のシステムでは、一致したものが無い場合とエラーの間に違いがないことに注意してください
{/solution}

{discussion}
これは`glob()`のラッパー関数です  
[glob](http://php.net/manual/ja/function.glob.php)
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
