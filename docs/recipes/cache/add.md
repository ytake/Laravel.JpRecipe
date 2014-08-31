---
Title:    キャッシュに指定したアイテムが無い場合に追加する
Topics:   cache
Code:     Cache::add()
Id:       267
Position: 16
---

{problem}
キャッシュに指定したアイテムが存在しない場合、そのアイテムを保存したい
{/problem}

{solution}
`Cache::add()`メソッドを利用します

```php
$result = \Cache::add($key, $value, $minutes);
if ($result) {
    echo "{$key} が {$minutes}　分間保存されます";
} else {
    echo "{$key} がcacheに存在している為、保存されません";
}
{/php}

アイテムが保存された場合は`true`、それ以外の場合は`false`が返却されます
{/solution}

{discussion}
このメソッドの注意点が2つあります

1. `false`が返却された場合は、`Cache::get()`でアイテムを取得することができます
2. cacheに指定したキーが存在し、その値が`null`の場合に、新しい値が保存された場合は **常に** `true`が返却されます
{/discussion}
