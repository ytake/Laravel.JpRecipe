---
Title:    キャッシュに保存されているアイテムの値をデクリメントする
Topics:   cache
Position: 22
---

{problem}
キャッシュの値をデクリメントしたい
{/problem}

{solution}
`Cache::decrement()`を利用します

```php
$value = \Cache::decrement('key');
```

`key`の値が10とした場合に、このメソッドが呼ばれた後 `$value`は9となり、  
その次は8、というようにデクリメントされて返却される様になります

デクリメントする値を指定することも可能です

```php
$value = \Cache::decrement('key', 50);
```
{/solution}

{discussion}
ファイル、データベースでキャッシュを利用している場合は動作しません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
