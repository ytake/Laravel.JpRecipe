---
Title:    一度だけファイルを読み込む
Topics:   file system
Position: 5
---

{problem}
一度だけファイルを読み込みたい

一般的にはPHPの`require_once`を利用しますが、これをLaravel流に利用してみましょう
{/problem}

{solution}
`File::requireOnce()` メソッドを利用します

```php
\File::requireOnce($some_php_file);
```
{/solution}

{discussion}
これは `require_once` のラッパー関数です

`require_once`と同様に、ファイルが存在しない場合は致命的なエラーが発生します
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
