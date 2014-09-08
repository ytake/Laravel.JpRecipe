---
Title:    キャッシュで永久的にアイテムを保存する
Topics:   cache
Position: 18
---

{problem}
キャッシュにアイテムを期限無く保存したい
{/problem}

{solution}
`Cache::forever()`メソッドを利用します

これは恒久的にアイテムを格納します

```php
\Cache::forever($key, $value);
```
{/solution}

{discussion}
キャッシュをクリアすると、永久的なアイテムも削除されます

`artisan cache:clear`、または`Cache::flush()`をコールすると  
`Cache::forever()`で保存したアイテムも全て削除されます
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
