---
Title:    ファイルの戻り値を取得する
Topics:   file system
Position: 4
---

{problem}
値を返すPHPファイ等がある場合に、ファイルの戻り値を取得したい
{/problem}

{solution}
`File::getRequire()` メソッドを利用します

```php
<?php
// file1.php - 配列を返却します
return [
    'key1' => 'value1',
    'key2' => 'value2',
];
```

```php
// 上記のファイルの配列をフェッチ
$value = \File::getRequire('file1.php');
```
{/solution}

{discussion}
ファイルが見つからない場合は例外がスローされます

`File::get()`と同様に `Illuminate\Filesystem\FileNotFoundException` がスローされます

try/catchを利用して、エラーを捕捉する様にしましょう
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
