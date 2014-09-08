---
Title:    キャッシュにアイテムを追加する
Topics:   cache
Position: 15
---

{problem}
キャッシュに値を保存したい
{/problem}

{solution}
`Cache::put()`メソッドを利用します

```php
\Cache::put($key, $value, $minutes);
```
{/solution}

{discussion}
キャッシュの保存と取得は、通常は以下のパターンを用います

```php
// 1. キャッシュから値を取得します
$value = \Cache::get($key);

// 2. 値を確認します
if ($value === null) {
    // 3. 保存したい値
    $value = 'just something easy';
    // 4. 有効時間を指定して値を保存します
    $minutes = 30;
    \Cache::put($key, $value, $minutes);
}
```
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
