---
Title:    ページネーションを実装する
Topics:   paginator
Position: 1
---

{problem}
ページャー/ページネーションを実装したい
{/problem}

{solution}
`Paginator::make()`を利用します  

第一引数にページネーションを実装したい配列を指定し、  
第二引数に配列の総数を指定します  
```php
$array = [
    [
        'id' => 1,
        'title' => 'Laravel'
    ],
    [
        'id' => 2,
        'title' => 'Recipes'
    ],
    [
        'id' => 3,
        'title' => 'JP Group'
    ],
];
\Paginator::make($array, count($array));
```

第三引数で1ページあたりのアイテム数を指定する事が出来ます  
デフォルトでは1ページあたりのアイテム数は15です

次の例では1ページあたり1アイテムとして、配列を操作します
```php
const PER_PAGE = 1;

$array = [
    [
        'id' => 1,
        'title' => 'Laravel'
    ],
    [
        'id' => 2,
        'title' => 'Recipes'
    ],
    [
        'id' => 3,
        'title' => 'JP Group'
    ],
];
$separates = array_chunk($array, self::PER_PAGE);
$current = (int) \Input::get('page', 1);
\Paginator::make($separates[$current - 1], count($array), self::PER_PAGE);
```

page番号は、デフォルトでは`page`引数が利用されます
```php
http://localhost/?page=1
```

page引数を任意のものに変更する場合は次の様に指定します
```php
$array = [
    [
        'id' => 1,
        'title' => 'Laravel'
    ],
    [
        'id' => 2,
        'title' => 'Recipes'
    ],
    [
        'id' => 3,
        'title' => 'JP Group'
    ],
];
\Paginator::setPageName('p');
\Paginator::make($array, count($array));
```
この場合は以下の様な引数が利用されます
```php
http://localhost/?p=1
```

Bladeテンプレートでページネーションを描画する場合は以下の様に記述します
```php
{{$page->links()}}
```
{/solution}

{discussion}
データベースと組み合わせて簡単に実装する事ができます  
[[クエリー結果でページネーションを実装する]] もご覧ください  

その他ページネーション関連のレシピは現在準備中です
{/discussion}

{credit}
Author:Yuuki Takezawa
{/credit}
