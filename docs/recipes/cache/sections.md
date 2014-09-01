---
Title:    キャッシュをタグ付け、またはセクションで整理する
Topics:   cache
Code:     Cache::section()
Id:       101
Position: 9
---

{problem}
kキャッシュにたくさんの値があり、その値を整理したい
{/problem}

{solution}
キャッシュをタグ付けしたり、セクションで整理することができます

`Cache::section()`, `Cache::tags()`を利用して、
キャッシュのアイテムを  _グループ化_ する事が出来ます

```php
$item = \Cache::section('inventory')->get('last-purchased');

$item = \Cache::tags('inventory')->get('last-purchased');
```

セクションや、タグは、キャッシュの値をそれぞれのグループとして利用し、
そのセクションやタグだけに作用する処理を実行したり、またはキャッシュ全体の処理を実行したりと、
細分化させて利用する事が出来ます

```php
// 値を保存します
\Cache::section('section')->put('key', 'value', $minutes);

// 値を取得
$value = \Cache::section('section')->get('key');

// セクション内の値を全て削除
\Cache::section('section')->flush();
```
{/solution}

{discussion}
`Cache::section()` は `Cache::tags()`のエイリアスです

セクション、タグはファイル、またはデータベースキャッシュドライバーでは利用できません
{/discussion}
