---
Title:    キャッシュからアイテムを取得、値が無い場合はデフォルト値を永久的に保存する
Topics:   cache
Code:     Cache::rememberForever(), Cache::sear()
Id:       270
Position: 19
---

{problem}
キャッシュからアイテムを取得し、
アイテムが無い場合は永久的に値を保存する様にしたい
{/problem}

{solution}
`Cache::rememberForever()`を利用します

```php
$value = \Cache::rememberForever($key, function() {
    // DBから値を取得する等のロジックを実装します
    return $value;
});
```

指定したキーのアイテムがキャッシュ内に存在する場合は、すぐに返却されます
値が存在しない場合は、無名関数が実行され、
関数の戻り値がキャッシュに永久的に保存され、その値が返却されます
{/solution}

{discussion}
`Cache::sear()`は`Cache::rememberForever()`のエイリアスです

このメソッドは `Cache::remember()` に似ていますが、
`$minutes`で有効時間を指定しない場合は、このメソッドを利用して値を保存して下さい

[[キャッシュからアイテムを取得、値が無い場合は値を保存する]] レシピもご覧ください
{/discussion}
