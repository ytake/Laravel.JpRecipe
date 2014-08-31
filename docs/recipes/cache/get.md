---
Title:    キャッシュからアイテムを取得する
Topics:   cache
Code:     Cache::get()
Id:       265
Position: 14
---

{problem}
キャッシュからアイテムを取得したい
{/problem}

{solution}
`Cache::get()`メソッドを利用します

```php　
$value = \Cache::get($key);
if ($value === null) {
    echo "Value wasn't cached.";
}
```

値が見つからない(または有効期限切れ)場合は、`Cache::get()`はデフォルトを返却します
デフォルトが第二引数で指定されていない場合は`null`が返却されます

```php
$value = \Cache::get($key, 'default-value');
// 値が無い場合はデフォルトの'default-value'が返却されます
echo $value;
```
{/solution}

{discussion}
`null`も保存される事に注意して下さい

`Cache::get()`のデフォルト値は`null`のため、
第二引数で指定しない限り`null`が返却されます

次のコードの場合、常に`true`となります

```php
// nullがtest1キーで保存
\Cache::put('test1', null, 60);
// test2が存在していれば削除
\Cache::forget('test2');

if (Cache::get('test1') == Cache::get('test2')) {
    echo "いつも表示されます";
}
```
{/discussion}
