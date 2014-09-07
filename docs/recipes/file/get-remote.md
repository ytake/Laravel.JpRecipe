---
Title:    リモートファイルの内容を取得する
Topics:   -
Position: 3
---

{problem}
リモートファイルの内容をロードしたい
{/problem}

{solution}
`File::getRemote()` メソッドを利用します

```php
$contents = \File::getRemote($url);
```
{/solution}

{discussion}
ファイルが取得できない場合は、`false`が返却されます

```php
$contents = \File::getRemote($url);
if ($contents === false) {
    die("ファイルが取得できません");
}
```
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
