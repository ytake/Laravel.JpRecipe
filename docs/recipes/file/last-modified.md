---
Title:    ファイルの最終更新日時を取得する
Topics:   file system
Position: 15
---

{problem}
ファイルが変更された最終更新日時を取得したい
{/problem}

{solution}
`File::lastModified()` メソッドを利用します

```php
$timestamp = \File::lastModified($filename);
if ($timestamp === false) {
    die("日時が取得できません");
}
```

UNIXタイムスタンプが返却されます
{/solution}

{discussion}
エラーの場合、警告がスローされます


ファイルの更新時刻を取得する前に、ファイルが存在することを確認しておきましょう  
[[ファイルが存在するか確認する]] を参照してください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
