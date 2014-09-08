---
Title:    キャッシュにアイテムが存在するか確認する
Topics:   cache
Position: 10
---

{problem}
キャッシュに指定したキーのアイテムが存在するか確認したい
{/problem}

{solution}
`Cache::has()`を利用します

```php
if (\Cache::has('mykey')) {
    echo "'mykey'はキャッシュされてます！";
}
```
{/solution}

{discussion}
アイテムが`null`の場合は動作しません

nullをキャッシュする場合は`Cache::has()`は`false`が返却されます

```php
\Cache::put('test-null', null, 10);
if (!Cache::has('test-null')) {
    echo "null!";
}
```
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
