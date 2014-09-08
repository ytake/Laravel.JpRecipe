---
Title:    キャッシュからアイテムを取得、値が無い場合は値を保存する
Topics:   cache
Position: 17
---

{problem}
キャッシュからアイテムを取得し、アイテムが無い場合は値を保存する様にしたい
{/problem}

{solution}
`Cache::remember()`メソッドを利用します

```php
$value = \Cache::remember($key, $minutes, function() {
    // DBから値を取得する等のロジックを実装します
    return $value;
});
```

指定したキーのアイテムがキャッシュ内に存在する場合は、すぐに返却されます  
値が存在しない場合は、無名関数が実行され、  
関数の戻り値がキャッシュに保存されて、その値が返却されます
{/solution}

{discussion}
`Cache::remember()`は複数の処理が組み合わされたオールインワンなメソッドです

これは [[キャッシュにアイテムを追加する]] であつかったものと同様のワークフローを実装しています  
キャッシュに値が無い場合以外は、無名関数は実行されません。
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
