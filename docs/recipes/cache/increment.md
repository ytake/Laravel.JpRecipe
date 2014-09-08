---
Title:    キャッシュに保存されているアイテムの値をインクリメントする
Topics:   cache
Position: 21
---

{problem}
キャッシュの値をインクリメントしたい
{/problem}

{solution}
`Cache::increment()`を利用します

```php
$value = \Cache::increment('key');
```

最初にメソッドがコールされた場合に`$value`が1となり、  
その次は2、というようにインクリメントされて返却される様になります

インクリメントする値を指定することも可能です

```php
$value = \Cache::increment('key', 50);
```
{/solution}

{discussion}
ファイル、データベースでキャッシュを利用している場合は動作しません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
